"undefined" != typeof globalThis
	? globalThis
	: "undefined" != typeof window
		? window
		: "undefined" != typeof global
			? global
			: "undefined" != typeof self && self;
function t(t, n) {
	return t((n = { exports: {} }), n.exports), n.exports;
}
var n = t(function (t, n) {
		t.exports = (function () {
			var t = "millisecond",
				n = "second",
				e = "minute",
				r = "hour",
				i = "day",
				s = "week",
				o = "month",
				u = "quarter",
				a = "year",
				h =
					/^(\d{4})-?(\d{1,2})-?(\d{0,2})[^0-9]*(\d{1,2})?:?(\d{1,2})?:?(\d{1,2})?.?(\d{1,3})?$/,
				f =
					/\[([^\]]+)]|Y{2,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a|A|m{1,2}|s{1,2}|Z{1,2}|SSS/g,
				c = function (t, n, e) {
					var r = String(t);
					return !r || r.length >= n
						? t
						: "" + Array(n + 1 - r.length).join(e) + t;
				},
				d = {
					s: c,
					z: function (t) {
						var n = -t.utcOffset(),
							e = Math.abs(n),
							r = Math.floor(e / 60),
							i = e % 60;
						return (n <= 0 ? "+" : "-") + c(r, 2, "0") + ":" + c(i, 2, "0");
					},
					m: function (t, n) {
						var e = 12 * (n.year() - t.year()) + (n.month() - t.month()),
							r = t.clone().add(e, o),
							i = n - r < 0,
							s = t.clone().add(e + (i ? -1 : 1), o);
						return Number(-(e + (n - r) / (i ? r - s : s - r)) || 0);
					},
					a: function (t) {
						return t < 0 ? Math.ceil(t) || 0 : Math.floor(t);
					},
					p: function (h) {
						return (
							{ M: o, y: a, w: s, d: i, h: r, m: e, s: n, ms: t, Q: u }[h] ||
							String(h || "")
								.toLowerCase()
								.replace(/s$/, "")
						);
					},
					u: function (t) {
						return void 0 === t;
					},
				},
				l = {
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
				$ = "en",
				m = {};
			m[$] = l;
			var M = function (t) {
					return t instanceof v;
				},
				D = function (t, n, e) {
					var r;
					if (!t) return $;
					if ("string" == typeof t) m[t] && (r = t), n && ((m[t] = n), (r = t));
					else {
						var i = t.name;
						(m[i] = t), (r = i);
					}
					return e || ($ = r), r;
				},
				y = function (t, n, e) {
					if (M(t)) return t.clone();
					var r = n ? ("string" == typeof n ? { format: n, pl: e } : n) : {};
					return (r.date = t), new v(r);
				},
				g = d;
			(g.l = D),
				(g.i = M),
				(g.w = function (t, n) {
					return y(t, { locale: n.$L, utc: n.$u });
				});
			var v = (function () {
				function c(t) {
					(this.$L = this.$L || D(t.locale, null, !0)), this.parse(t);
				}
				var d = c.prototype;
				return (
					(d.parse = function (t) {
						(this.$d = (function (t) {
							var n = t.date,
								e = t.utc;
							if (null === n) return new Date(NaN);
							if (g.u(n)) return new Date();
							if (n instanceof Date) return new Date(n);
							if ("string" == typeof n && !/Z$/i.test(n)) {
								var r = n.match(h);
								if (r)
									return e
										? new Date(
												Date.UTC(
													r[1],
													r[2] - 1,
													r[3] || 1,
													r[4] || 0,
													r[5] || 0,
													r[6] || 0,
													r[7] || 0,
												),
											)
										: new Date(
												r[1],
												r[2] - 1,
												r[3] || 1,
												r[4] || 0,
												r[5] || 0,
												r[6] || 0,
												r[7] || 0,
											);
							}
							return new Date(n);
						})(t)),
							this.init();
					}),
					(d.init = function () {
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
					(d.$utils = function () {
						return g;
					}),
					(d.isValid = function () {
						return !("Invalid Date" === this.$d.toString());
					}),
					(d.isSame = function (t, n) {
						var e = y(t);
						return this.startOf(n) <= e && e <= this.endOf(n);
					}),
					(d.isAfter = function (t, n) {
						return y(t) < this.startOf(n);
					}),
					(d.isBefore = function (t, n) {
						return this.endOf(n) < y(t);
					}),
					(d.$g = function (t, n, e) {
						return g.u(t) ? this[n] : this.set(e, t);
					}),
					(d.year = function (t) {
						return this.$g(t, "$y", a);
					}),
					(d.month = function (t) {
						return this.$g(t, "$M", o);
					}),
					(d.day = function (t) {
						return this.$g(t, "$W", i);
					}),
					(d.date = function (t) {
						return this.$g(t, "$D", "date");
					}),
					(d.hour = function (t) {
						return this.$g(t, "$H", r);
					}),
					(d.minute = function (t) {
						return this.$g(t, "$m", e);
					}),
					(d.second = function (t) {
						return this.$g(t, "$s", n);
					}),
					(d.millisecond = function (n) {
						return this.$g(n, "$ms", t);
					}),
					(d.unix = function () {
						return Math.floor(this.valueOf() / 1e3);
					}),
					(d.valueOf = function () {
						return this.$d.getTime();
					}),
					(d.startOf = function (t, u) {
						var h = this,
							f = !!g.u(u) || u,
							c = g.p(t),
							d = function (t, n) {
								var e = g.w(
									h.$u ? Date.UTC(h.$y, n, t) : new Date(h.$y, n, t),
									h,
								);
								return f ? e : e.endOf(i);
							},
							l = function (t, n) {
								return g.w(
									h
										.toDate()
										[
											t
										].apply(h.toDate(), (f ? [0, 0, 0, 0] : [23, 59, 59, 999]).slice(n)),
									h,
								);
							},
							$ = this.$W,
							m = this.$M,
							M = this.$D,
							D = "set" + (this.$u ? "UTC" : "");
						switch (c) {
							case a:
								return f ? d(1, 0) : d(31, 11);
							case o:
								return f ? d(1, m) : d(0, m + 1);
							case s:
								var y = this.$locale().weekStart || 0,
									v = ($ < y ? $ + 7 : $) - y;
								return d(f ? M - v : M + (6 - v), m);
							case i:
							case "date":
								return l(D + "Hours", 0);
							case r:
								return l(D + "Minutes", 1);
							case e:
								return l(D + "Seconds", 2);
							case n:
								return l(D + "Milliseconds", 3);
							default:
								return this.clone();
						}
					}),
					(d.endOf = function (t) {
						return this.startOf(t, !1);
					}),
					(d.$set = function (s, u) {
						var h,
							f = g.p(s),
							c = "set" + (this.$u ? "UTC" : ""),
							d = ((h = {}),
							(h[i] = c + "Date"),
							(h.date = c + "Date"),
							(h[o] = c + "Month"),
							(h[a] = c + "FullYear"),
							(h[r] = c + "Hours"),
							(h[e] = c + "Minutes"),
							(h[n] = c + "Seconds"),
							(h[t] = c + "Milliseconds"),
							h)[f],
							l = f === i ? this.$D + (u - this.$W) : u;
						if (f === o || f === a) {
							var $ = this.clone().set("date", 1);
							$.$d[d](l),
								$.init(),
								(this.$d = $.set(
									"date",
									Math.min(this.$D, $.daysInMonth()),
								).toDate());
						} else d && this.$d[d](l);
						return this.init(), this;
					}),
					(d.set = function (t, n) {
						return this.clone().$set(t, n);
					}),
					(d.get = function (t) {
						return this[g.p(t)]();
					}),
					(d.add = function (t, u) {
						var h,
							f = this;
						t = Number(t);
						var c = g.p(u),
							d = function (n) {
								var e = y(f);
								return g.w(e.date(e.date() + Math.round(n * t)), f);
							};
						if (c === o) return this.set(o, this.$M + t);
						if (c === a) return this.set(a, this.$y + t);
						if (c === i) return d(1);
						if (c === s) return d(7);
						var l =
								((h = {}), (h[e] = 6e4), (h[r] = 36e5), (h[n] = 1e3), h)[c] ||
								1,
							$ = this.valueOf() + t * l;
						return g.w($, this);
					}),
					(d.subtract = function (t, n) {
						return this.add(-1 * t, n);
					}),
					(d.format = function (t) {
						var n = this;
						if (!this.isValid()) return "Invalid Date";
						var e = t || "YYYY-MM-DDTHH:mm:ssZ",
							r = g.z(this),
							i = this.$locale(),
							s = this.$H,
							o = this.$m,
							u = this.$M,
							a = i.weekdays,
							h = i.months,
							c = function (t, r, i, s) {
								return (t && (t[r] || t(n, e))) || i[r].substr(0, s);
							},
							d = function (t) {
								return g.s(s % 12 || 12, t, "0");
							},
							l =
								i.meridiem ||
								function (t, n, e) {
									var r = t < 12 ? "AM" : "PM";
									return e ? r.toLowerCase() : r;
								},
							$ = {
								YY: String(this.$y).slice(-2),
								YYYY: this.$y,
								M: u + 1,
								MM: g.s(u + 1, 2, "0"),
								MMM: c(i.monthsShort, u, h, 3),
								MMMM: h[u] || h(this, e),
								D: this.$D,
								DD: g.s(this.$D, 2, "0"),
								d: String(this.$W),
								dd: c(i.weekdaysMin, this.$W, a, 2),
								ddd: c(i.weekdaysShort, this.$W, a, 3),
								dddd: a[this.$W],
								H: String(s),
								HH: g.s(s, 2, "0"),
								h: d(1),
								hh: d(2),
								a: l(s, o, !0),
								A: l(s, o, !1),
								m: String(o),
								mm: g.s(o, 2, "0"),
								s: String(this.$s),
								ss: g.s(this.$s, 2, "0"),
								SSS: g.s(this.$ms, 3, "0"),
								Z: r,
							};
						return e.replace(f, function (t, n) {
							return n || $[t] || r.replace(":", "");
						});
					}),
					(d.utcOffset = function () {
						return 15 * -Math.round(this.$d.getTimezoneOffset() / 15);
					}),
					(d.diff = function (t, h, f) {
						var c,
							d = g.p(h),
							l = y(t),
							$ = 6e4 * (l.utcOffset() - this.utcOffset()),
							m = this - l,
							M = g.m(this, l);
						return (
							(M =
								((c = {}),
								(c[a] = M / 12),
								(c[o] = M),
								(c[u] = M / 3),
								(c[s] = (m - $) / 6048e5),
								(c[i] = (m - $) / 864e5),
								(c[r] = m / 36e5),
								(c[e] = m / 6e4),
								(c[n] = m / 1e3),
								c)[d] || m),
							f ? M : g.a(M)
						);
					}),
					(d.daysInMonth = function () {
						return this.endOf(o).$D;
					}),
					(d.$locale = function () {
						return m[this.$L];
					}),
					(d.locale = function (t, n) {
						if (!t) return this.$L;
						var e = this.clone();
						return (e.$L = D(t, n, !0)), e;
					}),
					(d.clone = function () {
						return g.w(this.toDate(), this);
					}),
					(d.toDate = function () {
						return new Date(this.$d);
					}),
					(d.toJSON = function () {
						return this.isValid() ? this.toISOString() : null;
					}),
					(d.toISOString = function () {
						return this.$d.toISOString();
					}),
					(d.toString = function () {
						return this.$d.toUTCString();
					}),
					c
				);
			})();
			return (
				(y.prototype = v.prototype),
				(y.extend = function (t, n) {
					return t(n, v, y), y;
				}),
				(y.locale = D),
				(y.isDayjs = M),
				(y.unix = function (t) {
					return y(1e3 * t);
				}),
				(y.en = m[$]),
				(y.Ls = m),
				y
			);
		})();
	}),
	e = t(function (t, n) {
		var e, r, i, s, o, u, a, h, f;
		t.exports =
			((r =
				/(\[[^[]*\])|([-:\/.()\s]+)|(A|a|YYYY|YY?|MM?M?M?|Do|DD?|hh?|HH?|mm?|ss?|S{1,3}|z|ZZ?)/g),
			(o = /\d*[^\s\d-:\/.()]+/),
			(a = [
				/[+-]\d\d:?\d\d/,
				function (t) {
					var n, e;
					(this.zone || (this.zone = {})).offset =
						((n = t.match(/([+-]|\d\d)/g)),
						0 == (e = 60 * n[1] + +n[2]) ? 0 : "+" === n[0] ? -e : e);
				},
			]),
			(h = {
				A: [
					/[AP]M/,
					function (t) {
						this.afternoon = "PM" === t;
					},
				],
				a: [
					/[ap]m/,
					function (t) {
						this.afternoon = "pm" === t;
					},
				],
				S: [
					/\d/,
					function (t) {
						this.milliseconds = 100 * +t;
					},
				],
				SS: [
					(i = /\d\d/),
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
					(s = /\d\d?/),
					(u = function (t) {
						return function (n) {
							this[t] = +n;
						};
					})("seconds"),
				],
				ss: [s, u("seconds")],
				m: [s, u("minutes")],
				mm: [s, u("minutes")],
				H: [s, u("hours")],
				h: [s, u("hours")],
				HH: [s, u("hours")],
				hh: [s, u("hours")],
				D: [s, u("day")],
				DD: [i, u("day")],
				Do: [
					o,
					function (t) {
						var n = e.ordinal,
							r = t.match(/\d+/);
						if (((this.day = r[0]), n))
							for (var i = 1; i <= 31; i += 1)
								n(i).replace(/\[|\]/g, "") === t && (this.day = i);
					},
				],
				M: [s, u("month")],
				MM: [i, u("month")],
				MMM: [
					o,
					function (t) {
						var n = e,
							r = n.months,
							i = n.monthsShort,
							s = i
								? i.findIndex(function (n) {
										return n === t;
									})
								: r.findIndex(function (n) {
										return n.substr(0, 3) === t;
									});
						if (s < 0) throw new Error();
						this.month = s + 1;
					},
				],
				MMMM: [
					o,
					function (t) {
						var n = e.months.indexOf(t);
						if (n < 0) throw new Error();
						this.month = n + 1;
					},
				],
				Y: [/[+-]?\d+/, u("year")],
				YY: [
					i,
					function (t) {
						(t = +t), (this.year = t + (t > 68 ? 1900 : 2e3));
					},
				],
				YYYY: [/\d{4}/, u("year")],
				Z: a,
				ZZ: a,
			}),
			(f = function (t, n, e) {
				try {
					var i = (function (t) {
							for (var n = t.match(r), e = n.length, i = 0; i < e; i += 1) {
								var s = n[i],
									o = h[s],
									u = o && o[0],
									a = o && o[1];
								n[i] = a ? { regex: u, parser: a } : s.replace(/^\[|\]$/g, "");
							}
							return function (t) {
								for (var r = {}, i = 0, s = 0; i < e; i += 1) {
									var o = n[i];
									if ("string" == typeof o) s += o.length;
									else {
										var u = o.regex,
											a = o.parser,
											h = t.substr(s),
											f = u.exec(h)[0];
										a.call(r, f), (t = t.replace(f, ""));
									}
								}
								return (
									(function (t) {
										var n = t.afternoon;
										if (void 0 !== n) {
											var e = t.hours;
											n ? e < 12 && (t.hours += 12) : 12 === e && (t.hours = 0),
												delete t.afternoon;
										}
									})(r),
									r
								);
							};
						})(n)(t),
						s = i.year,
						o = i.month,
						u = i.day,
						a = i.hours,
						f = i.minutes,
						c = i.seconds,
						d = i.milliseconds,
						l = i.zone;
					if (l)
						return new Date(
							Date.UTC(s, o - 1, u, a || 0, f || 0, c || 0, d || 0) +
								60 * l.offset * 1e3,
						);
					var $ = new Date(),
						m = s || $.getFullYear(),
						M = o > 0 ? o - 1 : $.getMonth(),
						D = u || $.getDate(),
						y = a || 0,
						g = f || 0,
						v = c || 0,
						p = d || 0;
					return e
						? new Date(Date.UTC(m, M, D, y, g, v, p))
						: new Date(m, M, D, y, g, v, p);
				} catch (t) {
					return new Date("");
				}
			}),
			function (t, n, r) {
				var i = n.prototype,
					s = i.parse;
				i.parse = function (t) {
					var n = t.date,
						i = t.format,
						o = t.pl,
						u = t.utc;
					(this.$u = u),
						i
							? ((e = o ? r.Ls[o] : this.$locale()),
								(this.$d = f(n, i, u)),
								this.init(t))
							: s.call(this, t);
				};
			});
	});
n.extend(e);
const r = (t, e) => {
	let r = !1;
	if (e)
		switch (e) {
			case "ISO_8601":
				r = t;
				break;
			case "RFC_2822":
				r = n(t, "ddd, MM MMM YYYY HH:mm:ss ZZ").format("YYYYMMDD");
				break;
			case "MYSQL":
				r = n(t, "YYYY-MM-DD hh:mm:ss").format("YYYYMMDD");
				break;
			case "UNIX":
				r = n(t).unix();
				break;
			default:
				r = n(t, e).format("YYYYMMDD");
		}
	return r;
};
export { r as parseDate };
//# sourceMappingURL=date-cd80f82d.js.map
