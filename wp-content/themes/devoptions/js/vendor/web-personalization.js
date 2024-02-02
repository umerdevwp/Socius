/**
 * Socius - Web Personalization
 * Tracks interests page visits for applying webpage customizations
 * 
 * @version 2.1
 * @created 2017-12-21
 * @updated 2019-04-18
 *    - Add durations & visits to history
 *    - Add better debugging & logging
 *    - Add new cookie values:
 *        interest
 *        interest_by_duration
 *        interest_by_duration_total
 *        interest_by_visits
 *        interest_by_visits_total
 * @updated 2019-05-02
 *     - Add debugging output
 * @author erodriguez
 */
(function($) {
    var personalization = {
      
      name: 'Web Personalization',
      version: 2.1,
      expire_history: 30, // days
      expire_cookie: 30, // days
      
      /**
       * Initializes the component
       */
      init: function() {
        var self = this,
            $body = $('body[data-interest]');
        
        self.log(self.get('interests'));
        
        // Debugging
        var debug = this.param('debug');
        
        if (debug) {
          var expire = new Date;
          expire.setDate(expire.getDate() + self.expire_cookie);
          
          self.cookie('debug', 1, expire);
        }
        
        debug = self.cookie('debug');
        
        // Save interest on page load
        if ($body.length) {
          var interest = $body.data('interest');
  
          if (typeof interest === 'string' && interest.length) {
            self.track(interest);
          }
        }
        
        if (debug) {
          this.debug();
        }
      },
      
      /**
       * Get a query string parameter value
       *
       * @param string name
       * @return mixed
       */
      param: function(name) {
        var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(location.href);
  
        if (results == null) {
          var pattern1 = new RegExp('(\\?|&)+' + name + '$', 'i'),
              pattern2 = new RegExp('(\\?|&)+' + name + '=', 'i');
          
          return pattern1.test(location.search) || pattern2.test(location.search);
        } else {
          return results[1] || 0;
        }
      },
      
      /**
       * Get or set cookies
       *
       * @param string name The cookie name
       * @param mixed [value] The cookie value
       * @param number|Date [expire] The cookie expire date (number = expire days)
       * @param string [path] The cookie path
       * @return mixed The cookie value for get function calls
       */
      cookie: function(name, value, expire, path) {
        
        // 1) Set cookie
        if (typeof value !== 'undefined') {
          var expires = '';
          
          if (expire) {
            // Expire number value
            if (typeof expire === 'number') {
              var date = new Date();
              
              date.setTime(date.getTime() + (expire * 24 * 60 * 60 * 1000));
              
              expire = date;
            }
            
            // Expire string value
            if (typeof expire === 'string') {
              expires = "expires=" + expire + ';';
            }
            
            // Expire Date value
            if (expire instanceof Date) { 
              expires = ";expires=" + expire.toUTCString();
            }
          }
          
          // Prep path
          path = typeof path === 'string' ? ';path=' + path : '';
          path = !path ? ';path=/' : path;
          
          // Prep value
          if (typeof value === 'object') {
            if (value === null) {
              value = '';
            } else {
              value = JSON.stringify(value);
            }
          }
          
          value = encodeURI(value);
          
          document.cookie = name + "=" + value + expires + path;
          
          return;
        }
        
        // 2) Get cookie
        var name = name + '=',
            decoded = decodeURIComponent(document.cookie),
            items = decoded.split(/;/);
        
        for (var i = 0; i < items.length; i++) {
          var item = items[i];
          
          while (item.charAt(0) === ' ') {
            item = item.substring(1);
          }
          
          if (item.indexOf(name) === 0) {
            return item.substring(name.length, item.length);
          }
        }
        
        return '';
      },
  
      /**
       * Handles logging
       */
      log: function() {
        this.console('log', arguments);
      },
  
      /**
       * Handles errors
       */
      error: function() {
        this.console('error', arguments);
      },
  
      /**
       * Output to the console
       *
       * @param string type
       * @param array args
       */
      console: function(type, args) {
        var self = this;
        
        if (typeof type === 'string' && typeof console[type] === 'function' && typeof args !== 'undefined') {
          args = Array.prototype.slice.call(args);
  
          if ($.isArray(args) && args.length) {
            var debug = self.cookie('debug');
  
            if (debug) {
              args.unshift('[' + this.name + ']');
  
              console[type].apply(window, args);
            }
          }
        }
      },
      
      /**
       * Get a local storage data object value
       * 
       * @param string props The properties's path delimited by periods
       * @returns object
       */
      get: function(props) {
        var api = window.localStorage,
            json = api.getItem('socius');
      
        json = (typeof json !== 'string') ? '{}' : json;
        var data = JSON.parse(json);
        
        data = typeof data === 'object' ? data : {};
        
        data.interests = typeof data.interests === 'object' ? data.interests : {};
        data.interests.history = typeof data.interests.history === 'object' ? data.interests.history : [];
        data.interests.history = $.isArray(data.interests.history) ? data.interests.history : [];
        data.interests.durations = typeof data.interests.durations === 'object' ? data.interests.durations : {};
        data.interests.visits = typeof data.interests.visits === 'object' ? data.interests.visits : {};
  
        // Get a nested value
        // Example: personalization.get('history.0.time');
        if (typeof props === 'string' && props.length) {
          props = props.replace(/^interests\.?/i, '');
          
          var obj = data.interests,
              found = true;
          
          if (props.length) {
            props = props.split('.');
  
            props.forEach(function(prop, i) {
              prop = /^[0-9]+$/.test(prop) ? Number(prop) : prop;
  
              if (typeof obj[prop] !== 'undefined') {
                obj = obj[prop];
              } else {
                found = false;
              }
            });
          }
          
          if (found) {
            data = obj;
          } else {
            data = null;
          }
        }
        
        return data;
      },
      
      /**
       * Save the local storage data object
       *
       * @param object data
       */
      save: function(data) {
        if (typeof data === 'object') {
          var api = window.localStorage,
              json = JSON.stringify(data);
      
          api.setItem('socius', json);
        }
      },
      
      /**
       * Tracks an interest
       * 
       * @param string interest
       */
      track: function(interest) {
        if (typeof interest === 'string') {
          var self = this,
              data = self.get(),
              now = Date.now();
          
          // Save interest cookie
          var expire = new Date;
          expire.setDate(expire.getDate() + self.expire_cookie);
  
          self.cookie('interest', interest, expire);
          
          data.interests.type = interest;
          data.interests.lastpage = location.pathname;
          data.interests.time = now;
  
          // History prune expired
          var d = new Date;
          
          d.setDate(d.getDate() - self.expire_history);
          
          var expire = d.getTime();
   
          data.interests.history = data.interests.history.filter(function(entry) {
            return entry.time > expire;
          });
          
          // Add history
          var visit = {
            type: data.interests.type,
            href: data.interests.lastpage,
            duration: null,
            time: now
          };
          
          data.interests.history.unshift(visit);
  
          self.log('Saving...');
          self.log(data.interests);
  
          // Track interest page duration
          $(document).on('mousedown keydown beforeunload', {time: now, self: self}, self.update);
          
          self.save(data);
        }
      },
      
      /**
       * Updates the interest page duration
       */
      update: function(e) {
        var self = e && e.data ? e.data.self : null,
            time = e && e.data ? e.data.time : null;
  
        if (self && time) {
          var now = Date.now(),
              duration = now - time,
              data = self.get(),
              durations = {},
              visits = {},
              expire = new Date;
  
            expire.setDate(expire.getDate() + self.expire_cookie);
              
          $.each(data.interests.history, function(i, item) {
            if (item.time === time) {
              item.duration = duration;
            }
            
            if (item.duration) {
              durations[item.type] = typeof durations[item.type] === 'number' ? durations[item.type] + item.duration : item.duration;
            }
            
            visits[item.type] = typeof visits[item.type] === 'number' ? visits[item.type] + 1 : 1;
          });
          
          data.interests.durations = durations;
          data.interests.visits = visits;
          
          // 1) Determine & save interest_by_duration cookie
          var interest = {name: null, total: 0};
          
          for (var name in durations) {
            var total = durations[name];
            
            if (total > interest.total) {
              interest.name = name;
              interest.total = total;
            }
          }
          
          if (interest.name) {
            self.log('Durations', durations, interest);
            self.cookie('interest_by_duration', interest.name, expire);
            self.cookie('interest_by_duration_total', interest.total, expire);
          }
          
          // 2) Determine & save interest_by_visits cookie
          interest = {name: null, total: 0};
          
          for (var name in visits) {
            var total = visits[name];
            
            if (total > interest.total) {
              interest.name = name;
              interest.total = total;
            }
          }
          
          if (interest.name) {
            self.log('Visits', visits, interest);
            self.cookie('interest_by_visits', interest.name, expire);
            self.cookie('interest_by_visits_total', interest.total, expire);
          }
          
          self.save(data);
        }
      },
      
      /**
       * Reset component by clearing local storage & cookies
       */
      reset: function() {
        var self = this;
        
        if (confirm('You are about to reset ' + self.name + '...')) {
          var data = self.get();
          
          if (data.interests) {
            delete data.interests;
          }
          
          self.save(data);
          
          var names = ['interest', 'interest_by_duration', 'interest_by_visits'];
          
          for (var i = 0; i < names.length; i++) {
            var name = names[i];
  
            this.cookie(name, '');
          }
          
          location.reload();
        }
      },
    
      /**
       * Convert a timestamp to a unit of time
       *
       * @param number timestamp
       * @return string
       */
      time: function(timestamp) {
        timestamp = parseInt(timestamp);
        
        if (isNaN(timestamp)) {
          return '';
        }
  
        var value = '',
            type = '',
            seconds = Math.round(timestamp / 1000),
            minutes = Math.round((seconds / 60) * 100) / 100, 
            hours = Math.round((minutes / 60) * 100) / 100,
            days = Math.round((hours / 24) * 100) / 100;
        
        if (days > 1) {
          value = days;
          type = 'day';
        } else if (hours > 1) {
          value = hours;
          type = 'hour';
        } else if (minutes > 1) {
          value = minutes;
          type = 'minute';
        } else {
          value = seconds;
          type = 'second';
        }
        
        if (value > 1) {
          type += 's';
        }
        
        value = value + ' ' + type;
        value = value.trim();
        
        return value;
      },
      
      /**
       * Output component debugging
       */
      debug: function() {
        var self = this,
            id = self.name.replace(/\s+/g, '-').toLowerCase();
        
        if (!$('#socius-debug-' + id).length) {
          var self = this,
              interests = self.get('interests');
          
          if (interests) {
            var output = '';
            
            // 1) Cookies
            output += '<strong>Cookies</strong>';
            output += '<ol>';
            
            var names = ['interest', 'interest_by_duration', 'interest_by_visits'];
            
            for (var i = 0; i < names.length; i++) {
              var name = names[i],
                  value = this.cookie(name);
  
              output += '<li><strong>' + name + ':</strong> ' + value + '</li>';
            }
            
            output += '</ol>';
            
            // 2) Durations
            if (interests.durations) {
              var durations = interests.durations,
                  array = [];
              
              for (var prop in durations) {
                var value = durations[prop];
                
                array.push({
                  type: prop,
                  value: value
                });
              }
              
              durations = array;
              
              durations = durations.sort(function(a, b) {
                if (a.value > b.value) {
                  return -1;
                }
                
                if (a.value < b.value) {
                  return 1;
                }
  
                return 0;
              });
              
              output += '<strong>Page Durations</strong>';
              output += '<ol>';
              for (var i = 0; i < durations.length; i++) {
                var obj = durations[i],
                    time = this.time(obj.value);
                
                output += '<li><strong>' + obj.type + ':</strong> ' + time + '</li>';
              }
              output += '</ol>';
            }
            
            // 3) Visits
            if (interests.visits) {
              var visits = interests.visits,
                  array = [];
  
              for (var prop in visits) {
                var value = visits[prop];
                
                array.push({
                  type: prop,
                  value: value
                });
              }
              
              visits = array;
              
              visits = visits.sort(function(a, b) {
                if (a.value > b.value) {
                  return -1;
                }
                
                if (a.value < b.value) {
                  return 1;
                }
  
                return 0;
              });
              
              output += '<strong>Page Visits</strong>';
              output += '<ol>';
              for (var i = 0; i < visits.length; i++) {
                var obj = visits[i];
                
                output += '<li><strong>' + obj.type + ':</strong> ' + obj.value + '</li>';
              }
              output += '</ol>';
            }
            
            // 4) History
            if (interests.history) {
              var _history = interests.history;
              
              output += '<strong>Page History</strong>';
              output += '<ol>';
              for (var i = 0; i < _history.length; i++) {
                var obj = _history[i],
                    date = new Date(obj.time),
                    date_formatted = date.toUTCString(),
                    duration = this.time(obj.duration);
                    
                duration = duration ? ' (' + duration + ')' : '';
                
                output += '<li><strong><a href="' + obj.href + '">' + obj.type + '</a>:</strong> ' + date_formatted + duration + '</li>';
              }
              output += '</ol>';
            }
            
            if (output) {
              var html = '';
              
              if (!$('#socius-debug').length) {
                html = '<div id="socius-debug">';
                html += '<div style="text-align:center;background:#888;color:#FFF;padding:5px 10px">';
                html += '<div style="float:right;cursor:pointer;" title="Close">x</div>';
                html += 'Debugging';
                html += '</div>';
                html += '</div>';
                
                $('body').prepend(html);
                
                $('#socius-debug div[title="Close"]').on('click', {self: self}, self.close);
              }
              
              html = '<pre id="socius-debug-' + id + '" style="max-height:350px;overflow:auto;padding:20px">';
              html += '<div style="width:100%;margin-bottom:10px;padding-bottom:5px;border-bottom:1px dotted #DDD;font-size:16px">';
              html += '<strong>' + self.name + '</strong>';
              html += '<br />';
              html += '<i><small>Version ' + self.version + '</small></i>';
              html += '</div>';
              html += '<p><button type="button" onclick="window.personalization.reset()">Reset</button></p>';
              html += output;
              html += '</pre>';
              
              $('#socius-debug').append(html);
            }
          }
        }
      },
      
      /**
       * Close the debug window
       */
      close: function(e) {
        var self = e && e.data ? e.data.self : null,
            $debug = $(this).closest('#socius-debug');
        
        $debug.hide();
        
        if (self) {
          self.cookie('debug', '');
        }
      }
    };
    
    window.personalization = personalization;
    
    $(function() {
      personalization.init();
    });
  })(jQuery);