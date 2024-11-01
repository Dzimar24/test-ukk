!(function (t, e) {
  "object" == typeof exports && "undefined" != typeof module
    ? (module.exports = e())
    : "function" == typeof define && define.amd
      ? define(e)
      : ((t =
          "undefined" != typeof globalThis
            ? globalThis
            : t || self).dayjs_plugin_timezone = e());
})(this, function () {
  "use strict";
  var t = { year: 0, month: 1, day: 2, hour: 3, minute: 4, second: 5 },
    e = {};
  return function (n, i, o) {
    var r,
      a = function (t, n, i) {
        void 0 === i && (i = {});
        var o = new Date(t),
          r = (function (t, n) {
            void 0 === n && (n = {});
            var i = n.timeZoneName || "short",
              o = t + "|" + i,
              r = e[o];
            return (
              r ||
                ((r = new Intl.DateTimeFormat("en-US", {
                  hour12: !1,
                  timeZone: t,
                  year: "numeric",
                  month: "2-digit",
                  day: "2-digit",
                  hour: "2-digit",
                  minute: "2-digit",
                  second: "2-digit",
                  timeZoneName: i,
                })),
                (e[o] = r)),
              r
            );
          })(n, i);
        return r.formatToParts(o);
      },
      u = function (e, n) {
        for (var i = a(e, n), r = [], u = 0; u < i.length; u += 1) {
          var f = i[u],
            s = f.type,
            m = f.value,
            c = t[s];
          c >= 0 && (r[c] = parseInt(m, 10));
        }
        var d = r[3],
          l = 24 === d ? 0 : d,
          v =
            r[0] +
            "-" +
            r[1] +
            "-" +
            r[2] +
            " " +
            l +
            ":" +
            r[4] +
            ":" +
            r[5] +
            ":000",
          h = +e;
        return (o.utc(v).valueOf() - (h -= h % 1e3)) / 6e4;
      },
      f = i.prototype;
    (f.tz = function (t, e) {
      void 0 === t && (t = r);
      var n = this.utcOffset(),
        i = this.toDate(),
        a = i.toLocaleString("en-US", { timeZone: t }),
        u = Math.round((i - new Date(a)) / 1e3 / 60),
        f = o(a)
          .$set("millisecond", this.$ms)
          .utcOffset(15 * -Math.round(i.getTimezoneOffset() / 15) - u, !0);
      if (e) {
        var s = f.utcOffset();
        f = f.add(n - s, "minute");
      }
      return (f.$x.$timezone = t), f;
    }),
      (f.offsetName = function (t) {
        var e = this.$x.$timezone || o.tz.guess(),
          n = a(this.valueOf(), e, { timeZoneName: t }).find(function (t) {
            return "timezonename" === t.type.toLowerCase();
          });
        return n && n.value;
      });
    var s = f.startOf;
    (f.startOf = function (t, e) {
      if (!this.$x || !this.$x.$timezone) return s.call(this, t, e);
      var n = o(this.format("YYYY-MM-DD HH:mm:ss:SSS"));
      return s.call(n, t, e).tz(this.$x.$timezone, !0);
    }),
      (o.tz = function (t, e, n) {
        var i = n && e,
          a = n || e || r,
          f = u(+o(), a);
        if ("string" != typeof t) return o(t).tz(a);
        var s = (function (t, e, n) {
            var i = t - 60 * e * 1e3,
              o = u(i, n);
            if (e === o) return [i, e];
            var r = u((i -= 60 * (o - e) * 1e3), n);
            return o === r
              ? [i, o]
              : [t - 60 * Math.min(o, r) * 1e3, Math.max(o, r)];
          })(o.utc(t, i).valueOf(), f, a),
          m = s[0],
          c = s[1],
          d = o(m).utcOffset(c);
        return (d.$x.$timezone = a), d;
      }),
      (o.tz.guess = function () {
        return Intl.DateTimeFormat().resolvedOptions().timeZone;
      }),
      (o.tz.setDefault = function (t) {
        r = t;
      });
  };
});
