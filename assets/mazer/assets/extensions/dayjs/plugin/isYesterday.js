!(function (e, t) {
  "object" == typeof exports && "undefined" != typeof module
    ? (module.exports = t())
    : "function" == typeof define && define.amd
      ? define(t)
      : ((e =
          "undefined" != typeof globalThis
            ? globalThis
            : e || self).dayjs_plugin_isYesterday = t());
})(this, function () {
  "use strict";
  return function (e, t, n) {
    t.prototype.isYesterday = function () {
      var e = "YYYY-MM-DD",
        t = n().subtract(1, "day");
      return this.format(e) === t.format(e);
    };
  };
});
