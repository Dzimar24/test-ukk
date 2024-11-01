!(function (_, e) {
  "object" == typeof exports && "undefined" != typeof module
    ? (module.exports = e(require("dayjs")))
    : "function" == typeof define && define.amd
      ? define(["dayjs"], e)
      : ((_ =
          "undefined" != typeof globalThis
            ? globalThis
            : _ || self).dayjs_locale_ug_cn = e(_.dayjs));
})(this, function (_) {
  "use strict";
  function e(_) {
    return _ && "object" == typeof _ && "default" in _ ? _ : { default: _ };
  }
  var t = e(_),
    d = {
      name: "ug-cn",
      weekdays: "يەكشەنبە_دۈشەنبە_سەيشەنبە_چارشەنبە_پەيشەنبە_جۈمە_شەنبە".split(
        "_",
      ),
      months:
        "يانۋار_فېۋرال_مارت_ئاپرېل_ماي_ئىيۇن_ئىيۇل_ئاۋغۇست_سېنتەبىر_ئۆكتەبىر_نويابىر_دېكابىر".split(
          "_",
        ),
      weekStart: 1,
      weekdaysShort: "يە_دۈ_سە_چا_پە_جۈ_شە".split("_"),
      monthsShort:
        "يانۋار_فېۋرال_مارت_ئاپرېل_ماي_ئىيۇن_ئىيۇل_ئاۋغۇست_سېنتەبىر_ئۆكتەبىر_نويابىر_دېكابىر".split(
          "_",
        ),
      weekdaysMin: "يە_دۈ_سە_چا_پە_جۈ_شە".split("_"),
      ordinal: function (_) {
        return _;
      },
      formats: {
        LT: "HH:mm",
        LTS: "HH:mm:ss",
        L: "YYYY-MM-DD",
        LL: "YYYY-يىلىM-ئاينىڭD-كۈنى",
        LLL: "YYYY-يىلىM-ئاينىڭD-كۈنى، HH:mm",
        LLLL: "dddd، YYYY-يىلىM-ئاينىڭD-كۈنى، HH:mm",
      },
      relativeTime: {
        future: "%s كېيىن",
        past: "%s بۇرۇن",
        s: "نەچچە سېكونت",
        m: "بىر مىنۇت",
        mm: "%d مىنۇت",
        h: "بىر سائەت",
        hh: "%d سائەت",
        d: "بىر كۈن",
        dd: "%d كۈن",
        M: "بىر ئاي",
        MM: "%d ئاي",
        y: "بىر يىل",
        yy: "%d يىل",
      },
    };
  return t.default.locale(d, null, !0), d;
});
