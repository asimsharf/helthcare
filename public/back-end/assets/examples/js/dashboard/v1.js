(function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define('/dashboard/v1', ['jquery', 'Site'], factory);
  } else if (typeof exports !== "undefined") {
    factory(require('jquery'), require('Site'));
  } else {
    var mod = {
      exports: {}
    };
    factory(global.jQuery, global.Site);
    global.dashboardV1 = mod.exports;
  }
})(this, function (_jquery, _Site) {
  'use strict';

  var _jquery2 = babelHelpers.interopRequireDefault(_jquery);

  (0, _jquery2.default)(document).ready(function ($$$1) {
    (0, _Site.run)();

    (function () {
      var snow = new Skycons({
        "color": Config.colors("blue-grey", 500)
      });
      snow.set(document.getElementById("widgetSnow"), "snow");
      snow.play();

      var sunny = new Skycons({
        "color": Config.colors("blue-grey", 700)
      });
      sunny.set(document.getElementById("widgetSunny"), "clear-day");
      sunny.play();
    })();
   
  });
});