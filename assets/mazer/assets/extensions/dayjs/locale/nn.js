!(function (e, t) {
  "object" == typeof exports && "undefined" != typeof module
    ? (module.exports = t(require("dayjs")))
    : "function" == typeof define && define.amd
      ? define(["dayjs"], t)
      : ((e =
          "undefined" != typeof globalThis
            ? globalThis
            : e || self).dayjs_locale_nn = t(e.dayjs));
})(this, function (e) {
  "use strict";
  function t(e) {
    return e && "object" == typeof e && "default" in e ? e : { default: e };
  }
  var n = t(e),
    a = {
      name: "nn",
      weekdays: "sundag_måndag_tysdag_onsdag_torsdag_fredag_laurdag".split("_"),
      weekdaysShort: "sun_mån_tys_ons_tor_fre_lau".split("_"),
      weekdaysMin: "su_må_ty_on_to_fr_la".split("_"),
      months:
        "januar_februar_mars_april_mai_juni_juli_august_september_oktober_november_desember".split(
          "_",
        ),
      monthsShort: "jan_feb_mar_apr_mai_jun_jul_aug_sep_okt_nov_des".split("_"),
      ordinal: function (e) {
        return e + ".";
      },
      weekStart: 1,
      relativeTime: {
        future: "om %s",
        past: "for %s sidan",
        s: "nokre sekund",
        m: "eitt minutt",
        mm: "%d minutt",
        h: "ein time",
        hh: "%d timar",
        d: "ein dag",
        dd: "%d dagar",
        M: "ein månad",
        MM: "%d månadar",
        y: "eitt år",
        yy: "%d år",
      },
      formats: {
        LT: "HH:mm",
        LTS: "HH:mm:ss",
        L: "DD.MM.YYYY",
        LL: "D. MMMM YYYY",
        LLL: "D. MMMM YYYY [kl.] H:mm",
        LLLL: "dddd D. MMMM YYYY [kl.] HH:mm",
      },
    };
  return n.default.locale(a, null, !0), a;
});
