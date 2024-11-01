!(function (_, e) {
  "object" == typeof exports && "undefined" != typeof module
    ? (module.exports = e(require("dayjs")))
    : "function" == typeof define && define.amd
      ? define(["dayjs"], e)
      : ((_ =
          "undefined" != typeof globalThis
            ? globalThis
            : _ || self).dayjs_locale_ar_ly = e(_.dayjs));
})(this, function (_) {
  "use strict";
  function e(_) {
    return _ && "object" == typeof _ && "default" in _ ? _ : { default: _ };
  }
  var t = e(_),
    n = {
      name: "ar-ly",
      weekdays: "الأحد_الإثنين_الثلاثاء_الأربعاء_الخميس_الجمعة_السبت".split(
        "_",
      ),
      months:
        "يناير_فبراير_مارس_أبريل_مايو_يونيو_يوليو_أغسطس_سبتمبر_أكتوبر_نوفمبر_ديسمبر".split(
          "_",
        ),
      weekStart: 6,
      weekdaysShort: "أحد_إثنين_ثلاثاء_أربعاء_خميس_جمعة_سبت".split("_"),
      monthsShort:
        "يناير_فبراير_مارس_أبريل_مايو_يونيو_يوليو_أغسطس_سبتمبر_أكتوبر_نوفمبر_ديسمبر".split(
          "_",
        ),
      weekdaysMin: "ح_ن_ث_ر_خ_ج_س".split("_"),
      ordinal: function (_) {
        return _;
      },
      meridiem: function (_) {
        return _ > 12 ? "م" : "ص";
      },
      formats: {
        LT: "HH:mm",
        LTS: "HH:mm:ss",
        L: "D/‏M/‏YYYY",
        LL: "D MMMM YYYY",
        LLL: "D MMMM YYYY HH:mm",
        LLLL: "dddd D MMMM YYYY HH:mm",
      },
    };
  return t.default.locale(n, null, !0), n;
});
