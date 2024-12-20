"use strict";
"undefined" != typeof globalThis
	? globalThis
	: "undefined" != typeof window
		? window
		: "undefined" != typeof global
			? global
			: "undefined" != typeof self && self;
function t(t, e) {
	return t((e = { exports: {} }), e.exports), e.exports;
}
var e = t(function (t, e) {
		t.exports = (function () {
			var t = "millisecond",
				e = "second",
				n = "minute",
				r = "hour",
				i = "day",
				s = "week",
				a = "month",
				o = "quarter",
				u = "year",
				f = "date",
				h =
					/^(\d{4})[-/]?(\d{1,2})?[-/]?(\d{0,2})[^0-9]*(\d{1,2})?:?(\d{1,2})?:?(\d{1,2})?[.:]?(\d+)?$/,
				c =
					/\[([^\]]+)]|Y{1,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a|A|m{1,2}|s{1,2}|Z{1,2}|SSS/g,
				d = {
					name: "en",
					weekdays:
						"Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split(
							"_",
						),
					months:
						"January_February_March_April_May_June_July_August_September_October_November_December".split(
							"_",
						),
				},
				l = function (t, e, n) {
					var r = String(t);
					return !r || r.length >= e
						? t
						: "" + Array(e + 1 - r.length).join(n) + t;
				},
				M = {
					s: l,
					z: function (t) {
						var e = -t.utcOffset(),
							n = Math.abs(e),
							r = Math.floor(n / 60),
							i = n % 60;
						return (e <= 0 ? "+" : "-") + l(r, 2, "0") + ":" + l(i, 2, "0");
					},
					m: function t(e, n) {
						if (e.date() < n.date()) return -t(n, e);
						var r = 12 * (n.year() - e.year()) + (n.month() - e.month()),
							i = e.clone().add(r, a),
							s = n - i < 0,
							o = e.clone().add(r + (s ? -1 : 1), a);
						return +(-(r + (n - i) / (s ? i - o : o - i)) || 0);
					},
					a: function (t) {
						return t < 0 ? Math.ceil(t) || 0 : Math.floor(t);
					},
					p: function (h) {
						return (
							{ M: a, y: u, w: s, d: i, D: f, h: r, m: n, s: e, ms: t, Q: o }[
								h
							] ||
							String(h || "")
								.toLowerCase()
								.replace(/s$/, "")
						);
					},
					u: function (t) {
						return void 0 === t;
					},
				},
				$ = "en",
				m = {};
			m[$] = d;
			var D = function (t) {
					return t instanceof y;
				},
				Y = function (t, e, n) {
					var r;
					if (!t) return $;
					if ("string" == typeof t) m[t] && (r = t), e && ((m[t] = e), (r = t));
					else {
						var i = t.name;
						(m[i] = t), (r = i);
					}
					return !n && r && ($ = r), r || (!n && $);
				},
				v = function (t, e) {
					if (D(t)) return t.clone();
					var n = "object" == typeof e ? e : {};
					return (n.date = t), (n.args = arguments), new y(n);
				},
				p = M;
			(p.l = Y),
				(p.i = D),
				(p.w = function (t, e) {
					return v(t, { locale: e.$L, utc: e.$u, x: e.$x, $offset: e.$offset });
				});
			var y = (function () {
					function d(t) {
						(this.$L = Y(t.locale, null, !0)), this.parse(t);
					}
					var l = d.prototype;
					return (
						(l.parse = function (t) {
							(this.$d = (function (t) {
								var e = t.date,
									n = t.utc;
								if (null === e) return new Date(NaN);
								if (p.u(e)) return new Date();
								if (e instanceof Date) return new Date(e);
								if ("string" == typeof e && !/Z$/i.test(e)) {
									var r = e.match(h);
									if (r) {
										var i = r[2] - 1 || 0,
											s = (r[7] || "0").substring(0, 3);
										return n
											? new Date(
													Date.UTC(
														r[1],
														i,
														r[3] || 1,
														r[4] || 0,
														r[5] || 0,
														r[6] || 0,
														s,
													),
												)
											: new Date(
													r[1],
													i,
													r[3] || 1,
													r[4] || 0,
													r[5] || 0,
													r[6] || 0,
													s,
												);
									}
								}
								return new Date(e);
							})(t)),
								(this.$x = t.x || {}),
								this.init();
						}),
						(l.init = function () {
							var t = this.$d;
							(this.$y = t.getFullYear()),
								(this.$M = t.getMonth()),
								(this.$D = t.getDate()),
								(this.$W = t.getDay()),
								(this.$H = t.getHours()),
								(this.$m = t.getMinutes()),
								(this.$s = t.getSeconds()),
								(this.$ms = t.getMilliseconds());
						}),
						(l.$utils = function () {
							return p;
						}),
						(l.isValid = function () {
							return !("Invalid Date" === this.$d.toString());
						}),
						(l.isSame = function (t, e) {
							var n = v(t);
							return this.startOf(e) <= n && n <= this.endOf(e);
						}),
						(l.isAfter = function (t, e) {
							return v(t) < this.startOf(e);
						}),
						(l.isBefore = function (t, e) {
							return this.endOf(e) < v(t);
						}),
						(l.$g = function (t, e, n) {
							return p.u(t) ? this[e] : this.set(n, t);
						}),
						(l.unix = function () {
							return Math.floor(this.valueOf() / 1e3);
						}),
						(l.valueOf = function () {
							return this.$d.getTime();
						}),
						(l.startOf = function (t, o) {
							var h = this,
								c = !!p.u(o) || o,
								d = p.p(t),
								l = function (t, e) {
									var n = p.w(
										h.$u ? Date.UTC(h.$y, e, t) : new Date(h.$y, e, t),
										h,
									);
									return c ? n : n.endOf(i);
								},
								M = function (t, e) {
									return p.w(
										h
											.toDate()
											[
												t
											].apply(h.toDate("s"), (c ? [0, 0, 0, 0] : [23, 59, 59,
															999]).slice(e)),
										h,
									);
								},
								$ = this.$W,
								m = this.$M,
								D = this.$D,
								Y = "set" + (this.$u ? "UTC" : "");
							switch (d) {
								case u:
									return c ? l(1, 0) : l(31, 11);
								case a:
									return c ? l(1, m) : l(0, m + 1);
								case s:
									var v = this.$locale().weekStart || 0,
										y = ($ < v ? $ + 7 : $) - v;
									return l(c ? D - y : D + (6 - y), m);
								case i:
								case f:
									return M(Y + "Hours", 0);
								case r:
									return M(Y + "Minutes", 1);
								case n:
									return M(Y + "Seconds", 2);
								case e:
									return M(Y + "Milliseconds", 3);
								default:
									return this.clone();
							}
						}),
						(l.endOf = function (t) {
							return this.startOf(t, !1);
						}),
						(l.$set = function (s, o) {
							var h,
								c = p.p(s),
								d = "set" + (this.$u ? "UTC" : ""),
								l = ((h = {}),
								(h[i] = d + "Date"),
								(h[f] = d + "Date"),
								(h[a] = d + "Month"),
								(h[u] = d + "FullYear"),
								(h[r] = d + "Hours"),
								(h[n] = d + "Minutes"),
								(h[e] = d + "Seconds"),
								(h[t] = d + "Milliseconds"),
								h)[c],
								M = c === i ? this.$D + (o - this.$W) : o;
							if (c === a || c === u) {
								var $ = this.clone().set(f, 1);
								$.$d[l](M),
									$.init(),
									(this.$d = $.set(f, Math.min(this.$D, $.daysInMonth())).$d);
							} else l && this.$d[l](M);
							return this.init(), this;
						}),
						(l.set = function (t, e) {
							return this.clone().$set(t, e);
						}),
						(l.get = function (t) {
							return this[p.p(t)]();
						}),
						(l.add = function (t, o) {
							var f,
								h = this;
							t = Number(t);
							var c = p.p(o),
								d = function (e) {
									var n = v(h);
									return p.w(n.date(n.date() + Math.round(e * t)), h);
								};
							if (c === a) return this.set(a, this.$M + t);
							if (c === u) return this.set(u, this.$y + t);
							if (c === i) return d(1);
							if (c === s) return d(7);
							var l =
									((f = {}), (f[n] = 6e4), (f[r] = 36e5), (f[e] = 1e3), f)[c] ||
									1,
								M = this.$d.getTime() + t * l;
							return p.w(M, this);
						}),
						(l.subtract = function (t, e) {
							return this.add(-1 * t, e);
						}),
						(l.format = function (t) {
							var e = this;
							if (!this.isValid()) return "Invalid Date";
							var n = t || "YYYY-MM-DDTHH:mm:ssZ",
								r = p.z(this),
								i = this.$locale(),
								s = this.$H,
								a = this.$m,
								o = this.$M,
								u = i.weekdays,
								f = i.months,
								h = function (t, r, i, s) {
									return (t && (t[r] || t(e, n))) || i[r].substr(0, s);
								},
								d = function (t) {
									return p.s(s % 12 || 12, t, "0");
								},
								l =
									i.meridiem ||
									function (t, e, n) {
										var r = t < 12 ? "AM" : "PM";
										return n ? r.toLowerCase() : r;
									},
								M = {
									YY: String(this.$y).slice(-2),
									YYYY: this.$y,
									M: o + 1,
									MM: p.s(o + 1, 2, "0"),
									MMM: h(i.monthsShort, o, f, 3),
									MMMM: h(f, o),
									D: this.$D,
									DD: p.s(this.$D, 2, "0"),
									d: String(this.$W),
									dd: h(i.weekdaysMin, this.$W, u, 2),
									ddd: h(i.weekdaysShort, this.$W, u, 3),
									dddd: u[this.$W],
									H: String(s),
									HH: p.s(s, 2, "0"),
									h: d(1),
									hh: d(2),
									a: l(s, a, !0),
									A: l(s, a, !1),
									m: String(a),
									mm: p.s(a, 2, "0"),
									s: String(this.$s),
									ss: p.s(this.$s, 2, "0"),
									SSS: p.s(this.$ms, 3, "0"),
									Z: r,
								};
							return n.replace(c, function (t, e) {
								return e || M[t] || r.replace(":", "");
							});
						}),
						(l.utcOffset = function () {
							return 15 * -Math.round(this.$d.getTimezoneOffset() / 15);
						}),
						(l.diff = function (t, f, h) {
							var c,
								d = p.p(f),
								l = v(t),
								M = 6e4 * (l.utcOffset() - this.utcOffset()),
								$ = this - l,
								m = p.m(this, l);
							return (
								(m =
									((c = {}),
									(c[u] = m / 12),
									(c[a] = m),
									(c[o] = m / 3),
									(c[s] = ($ - M) / 6048e5),
									(c[i] = ($ - M) / 864e5),
									(c[r] = $ / 36e5),
									(c[n] = $ / 6e4),
									(c[e] = $ / 1e3),
									c)[d] || $),
								h ? m : p.a(m)
							);
						}),
						(l.daysInMonth = function () {
							return this.endOf(a).$D;
						}),
						(l.$locale = function () {
							return m[this.$L];
						}),
						(l.locale = function (t, e) {
							if (!t) return this.$L;
							var n = this.clone(),
								r = Y(t, e, !0);
							return r && (n.$L = r), n;
						}),
						(l.clone = function () {
							return p.w(this.$d, this);
						}),
						(l.toDate = function () {
							return new Date(this.valueOf());
						}),
						(l.toJSON = function () {
							return this.isValid() ? this.toISOString() : null;
						}),
						(l.toISOString = function () {
							return this.$d.toISOString();
						}),
						(l.toString = function () {
							return this.$d.toUTCString();
						}),
						d
					);
				})(),
				g = y.prototype;
			return (
				(v.prototype = g),
				[
					["$ms", t],
					["$s", e],
					["$m", n],
					["$H", r],
					["$W", i],
					["$M", a],
					["$y", u],
					["$D", f],
				].forEach(function (t) {
					g[t[1]] = function (e) {
						return this.$g(e, t[0], t[1]);
					};
				}),
				(v.extend = function (t, e) {
					return t.$i || (t(e, y, v), (t.$i = !0)), v;
				}),
				(v.locale = Y),
				(v.isDayjs = D),
				(v.unix = function (t) {
					return v(1e3 * t);
				}),
				(v.en = m[$]),
				(v.Ls = m),
				(v.p = {}),
				v
			);
		})();
	}),
	n = t(function (t, e) {
		var n, r, i, s, a, o, u, f, h, c, d, l, M;
		t.exports =
			((n = {
				LTS: "h:mm:ss A",
				LT: "h:mm A",
				L: "MM/DD/YYYY",
				LL: "MMMM D, YYYY",
				LLL: "MMMM D, YYYY h:mm A",
				LLLL: "dddd, MMMM D, YYYY h:mm A",
			}),
			(r = function (t, e) {
				return t.replace(
					/(\[[^\]]+])|(LTS?|l{1,4}|L{1,4})/g,
					function (t, r, i) {
						var s = i && i.toUpperCase();
						return (
							r ||
							e[i] ||
							n[i] ||
							e[s].replace(
								/(\[[^\]]+])|(MMMM|MM|DD|dddd)/g,
								function (t, e, n) {
									return e || n.slice(1);
								},
							)
						);
					},
				);
			}),
			(i =
				/(\[[^[]*\])|([-:/.()\s]+)|(A|a|YYYY|YY?|MM?M?M?|Do|DD?|hh?|HH?|mm?|ss?|S{1,3}|z|ZZ?)/g),
			(u = {}),
			(h = [
				/[+-]\d\d:?(\d\d)?/,
				function (t) {
					(this.zone || (this.zone = {})).offset = (function (t) {
						if (!t) return 0;
						var e = t.match(/([+-]|\d\d)/g),
							n = 60 * e[1] + (+e[2] || 0);
						return 0 === n ? 0 : "+" === e[0] ? -n : n;
					})(t);
				},
			]),
			(c = function (t) {
				var e = u[t];
				return e && (e.indexOf ? e : e.s.concat(e.f));
			}),
			(d = function (t, e) {
				var n,
					r = u.meridiem;
				if (r) {
					for (var i = 1; i <= 24; i += 1)
						if (t.indexOf(r(i, 0, e)) > -1) {
							n = i > 12;
							break;
						}
				} else n = t === (e ? "pm" : "PM");
				return n;
			}),
			(l = {
				A: [
					(o = /\d*[^\s\d-:/()]+/),
					function (t) {
						this.afternoon = d(t, !1);
					},
				],
				a: [
					o,
					function (t) {
						this.afternoon = d(t, !0);
					},
				],
				S: [
					/\d/,
					function (t) {
						this.milliseconds = 100 * +t;
					},
				],
				SS: [
					(s = /\d\d/),
					function (t) {
						this.milliseconds = 10 * +t;
					},
				],
				SSS: [
					/\d{3}/,
					function (t) {
						this.milliseconds = +t;
					},
				],
				s: [
					(a = /\d\d?/),
					(f = function (t) {
						return function (e) {
							this[t] = +e;
						};
					})("seconds"),
				],
				ss: [a, f("seconds")],
				m: [a, f("minutes")],
				mm: [a, f("minutes")],
				H: [a, f("hours")],
				h: [a, f("hours")],
				HH: [a, f("hours")],
				hh: [a, f("hours")],
				D: [a, f("day")],
				DD: [s, f("day")],
				Do: [
					o,
					function (t) {
						var e = u.ordinal,
							n = t.match(/\d+/);
						if (((this.day = n[0]), e))
							for (var r = 1; r <= 31; r += 1)
								e(r).replace(/\[|\]/g, "") === t && (this.day = r);
					},
				],
				M: [a, f("month")],
				MM: [s, f("month")],
				MMM: [
					o,
					function (t) {
						var e = c("months"),
							n =
								(
									c("monthsShort") ||
									e.map(function (t) {
										return t.substr(0, 3);
									})
								).indexOf(t) + 1;
						if (n < 1) throw new Error();
						this.month = n % 12 || n;
					},
				],
				MMMM: [
					o,
					function (t) {
						var e = c("months").indexOf(t) + 1;
						if (e < 1) throw new Error();
						this.month = e % 12 || e;
					},
				],
				Y: [/[+-]?\d+/, f("year")],
				YY: [
					s,
					function (t) {
						(t = +t), (this.year = t + (t > 68 ? 1900 : 2e3));
					},
				],
				YYYY: [/\d{4}/, f("year")],
				Z: h,
				ZZ: h,
			}),
			(M = function (t, e, n) {
				try {
					var s = (function (t) {
							for (
								var e = (t = r(t, u && u.formats)).match(i),
									n = e.length,
									s = 0;
								s < n;
								s += 1
							) {
								var a = e[s],
									o = l[a],
									f = o && o[0],
									h = o && o[1];
								e[s] = h ? { regex: f, parser: h } : a.replace(/^\[|\]$/g, "");
							}
							return function (t) {
								for (var r = {}, i = 0, s = 0; i < n; i += 1) {
									var a = e[i];
									if ("string" == typeof a) s += a.length;
									else {
										var o = a.regex,
											u = a.parser,
											f = t.substr(s),
											h = o.exec(f)[0];
										u.call(r, h), (t = t.replace(h, ""));
									}
								}
								return (
									(function (t) {
										var e = t.afternoon;
										if (void 0 !== e) {
											var n = t.hours;
											e ? n < 12 && (t.hours += 12) : 12 === n && (t.hours = 0),
												delete t.afternoon;
										}
									})(r),
									r
								);
							};
						})(e)(t),
						a = s.year,
						o = s.month,
						f = s.day,
						h = s.hours,
						c = s.minutes,
						d = s.seconds,
						M = s.milliseconds,
						$ = s.zone,
						m = new Date(),
						D = f || (a || o ? 1 : m.getDate()),
						Y = a || m.getFullYear(),
						v = 0;
					(a && !o) || (v = o > 0 ? o - 1 : m.getMonth());
					var p = h || 0,
						y = c || 0,
						g = d || 0,
						S = M || 0;
					return $
						? new Date(Date.UTC(Y, v, D, p, y, g, S + 60 * $.offset * 1e3))
						: n
							? new Date(Date.UTC(Y, v, D, p, y, g, S))
							: new Date(Y, v, D, p, y, g, S);
				} catch (t) {
					return new Date("");
				}
			}),
			function (t, e, n) {
				n.p.customParseFormat = !0;
				var r = e.prototype,
					i = r.parse;
				r.parse = function (t) {
					var e = t.date,
						r = t.utc,
						s = t.args;
					this.$u = r;
					var a = s[1];
					if ("string" == typeof a) {
						var o = !0 === s[2],
							f = !0 === s[3],
							h = o || f,
							c = s[2];
						f && (c = s[2]),
							(u = this.$locale()),
							!o && c && (u = n.Ls[c]),
							(this.$d = M(e, a, r)),
							this.init(),
							c && !0 !== c && (this.$L = this.locale(c).$L),
							h && e !== this.format(a) && (this.$d = new Date("")),
							(u = {});
					} else if (a instanceof Array)
						for (var d = a.length, l = 1; l <= d; l += 1) {
							s[1] = a[l - 1];
							var $ = n.apply(this, s);
							if ($.isValid()) {
								(this.$d = $.$d), (this.$L = $.$L), this.init();
								break;
							}
							l === d && (this.$d = new Date(""));
						}
					else i.call(this, t);
				};
			});
	});
e.extend(n);
exports.parseDate = (t, n) => {
	let r = !1;
	if (n)
		switch (n) {
			case "ISO_8601":
				r = t;
				break;
			case "RFC_2822":
				r = e(t, "ddd, MM MMM YYYY HH:mm:ss ZZ").format("YYYYMMDD");
				break;
			case "MYSQL":
				r = e(t, "YYYY-MM-DD hh:mm:ss").format("YYYYMMDD");
				break;
			case "UNIX":
				r = e(t).unix();
				break;
			default:
				r = e(t, n).format("YYYYMMDD");
		}
	return r;
};
//# sourceMappingURL=date-cd1c23ce.js.map
