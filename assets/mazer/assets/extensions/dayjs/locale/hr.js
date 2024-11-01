!(function (e, a) {
  "object" == typeof exports && "undefined" != typeof module
    ? (module.exports = a(require("dayjs")))
    : "function" == typeof define && define.amd
      ? define(["dayjs"], a)
      : ((e =
          "undefined" != typeof globalThis
            ? globalThis
            : e || self).dayjs_locale_hr = a(e.dayjs));
})(this, function (e) {
  "use strict";
  function a(e) {
    return e && "object" == typeof e && "default" in e ? e : { default: e };
  }
  var t = a(e),
    s =
      "siječnja_veljače_ožujka_travnja_svibnja_lipnja_srpnja_kolovoza_rujna_listopada_studenoga_prosinca".split(
        "_",
      ),
    n =
      "siječanj_veljača_ožujak_travanj_svibanj_lipanj_srpanj_kolovoz_rujan_listopad_studeni_prosinac".split(
        "_",
      ),
    _ = /D[oD]?(\[[^[\]]*\]|\s)+MMMM?/,
    o = function (e, a) {
      return _.test(a) ? s[e.month()] : n[e.month()];
    };
  (o.s = n), (o.f = s);
  var i = {
    name: "hr",
    weekdays: "nedjelja_ponedjeljak_utorak_srijeda_četvrtak_petak_subota".split(
      "_",
    ),
    weekdaysShort: "ned._pon._uto._sri._čet._pet._sub.".split("_"),
    weekdaysMin: "ne_po_ut_sr_če_pe_su".split("_"),
    months: o,
    monthsShort:
      "sij._velj._ožu._tra._svi._lip._srp._kol._ruj._lis._stu._pro.".split("_"),
    weekStart: 1,
    formats: {
      LT: "H:mm",
      LTS: "H:mm:ss",
      L: "DD.MM.YYYY",
      LL: "D. MMMM YYYY",
      LLL: "D. MMMM YYYY H:mm",
      LLLL: "dddd, D. MMMM YYYY H:mm",
    },
    relativeTime: {
      future: "za %s",
      past: "prije %s",
      s: "sekunda",
      m: "minuta",
      mm: "%d minuta",
      h: "sat",
      hh: "%d sati",
      d: "dan",
      dd: "%d dana",
      M: "mjesec",
      MM: "%d mjeseci",
      y: "godina",
      yy: "%d godine",
    },
    ordinal: function (e) {
      return e + ".";
    },
  };
  return t.default.locale(i, null, !0), i;
});
