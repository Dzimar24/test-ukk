System.register([], function (t) {
	"use strict";
	return {
		execute: function () {
			"undefined" != typeof globalThis
				? globalThis
				: "undefined" != typeof window
					? window
					: "undefined" != typeof global
						? global
						: "undefined" != typeof self && self;
			var e = { exports: {} };
			e.exports = (function () {
				var t = 1e3,
					e = 6e4,
					n = 36e5,
					r = "millisecond",
					i = "second",
					s = "minute",
					a = "hour",
					o = "day",
					u = "week",
					f = "month",
					h = "quarter",
					c = "year",
					d = "date",
					l = "Invalid Date",
					$ =
						/^(\d{4})[-/]?(\d{1,2})?[-/]?(\d{0,2})[Tt\s]*(\d{1,2})?:?(\d{1,2})?:?(\d{1,2})?[.:]?(\d+)?$/,
					M =
						/\[([^\]]+)]|Y{1,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a|A|m{1,2}|s{1,2}|Z{1,2}|SSS/g,
					m = {
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
					v = function (t, e, n) {
						var r = String(t);
						return !r || r.length >= e
							? t
							: "" + Array(e + 1 - r.length).join(n) + t;
					},
					D = {
						s: v,
						z: function (t) {
							var e = -t.utcOffset(),
								n = Math.abs(e),
								r = Math.floor(n / 60),
								i = n % 60;
							return (e <= 0 ? "+" : "-") + v(r, 2, "0") + ":" + v(i, 2, "0");
						},
						m: function t(e, n) {
							if (e.date() < n.date()) return -t(n, e);
							var r = 12 * (n.year() - e.year()) + (n.month() - e.month()),
								i = e.clone().add(r, f),
								s = n - i < 0,
								a = e.clone().add(r + (s ? -1 : 1), f);
							return +(-(r + (n - i) / (s ? i - a : a - i)) || 0);
						},
						a: function (t) {
							return t < 0 ? Math.ceil(t) || 0 : Math.floor(t);
						},
						p: function (t) {
							return (
								{ M: f, y: c, w: u, d: o, D: d, h: a, m: s, s: i, ms: r, Q: h }[
									t
								] ||
								String(t || "")
									.toLowerCase()
									.replace(/s$/, "")
							);
						},
						u: function (t) {
							return void 0 === t;
						},
					},
					p = "en",
					g = {};
				g[p] = m;
				var y = function (t) {
						return t instanceof L;
					},
					Y = function t(e, n, r) {
						var i;
						if (!e) return p;
						if ("string" == typeof e) {
							var s = e.toLowerCase();
							g[s] && (i = s), n && ((g[s] = n), (i = s));
							var a = e.split("-");
							if (!i && a.length > 1) return t(a[0]);
						} else {
							var o = e.name;
							(g[o] = e), (i = o);
						}
						return !r && i && (p = i), i || (!r && p);
					},
					S = function (t, e) {
						if (y(t)) return t.clone();
						var n = "object" == typeof e ? e : {};
						return (n.date = t), (n.args = arguments), new L(n);
					},
					w = D;
				(w.l = Y),
					(w.i = y),
					(w.w = function (t, e) {
						return S(t, {
							locale: e.$L,
							utc: e.$u,
							x: e.$x,
							$offset: e.$offset,
						});
					});
				var L = (function () {
						function m(t) {
							(this.$L = Y(t.locale, null, !0)), this.parse(t);
						}
						var v = m.prototype;
						return (
							(v.parse = function (t) {
								(this.$d = (function (t) {
									var e = t.date,
										n = t.utc;
									if (null === e) return new Date(NaN);
									if (w.u(e)) return new Date();
									if (e instanceof Date) return new Date(e);
									if ("string" == typeof e && !/Z$/i.test(e)) {
										var r = e.match($);
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
							(v.init = function () {
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
							(v.$utils = function () {
								return w;
							}),
							(v.isValid = function () {
								return !(this.$d.toString() === l);
							}),
							(v.isSame = function (t, e) {
								var n = S(t);
								return this.startOf(e) <= n && n <= this.endOf(e);
							}),
							(v.isAfter = function (t, e) {
								return S(t) < this.startOf(e);
							}),
							(v.isBefore = function (t, e) {
								return this.endOf(e) < S(t);
							}),
							(v.$g = function (t, e, n) {
								return w.u(t) ? this[e] : this.set(n, t);
							}),
							(v.unix = function () {
								return Math.floor(this.valueOf() / 1e3);
							}),
							(v.valueOf = function () {
								return this.$d.getTime();
							}),
							(v.startOf = function (t, e) {
								var n = this,
									r = !!w.u(e) || e,
									h = w.p(t),
									l = function (t, e) {
										var i = w.w(
											n.$u ? Date.UTC(n.$y, e, t) : new Date(n.$y, e, t),
											n,
										);
										return r ? i : i.endOf(o);
									},
									$ = function (t, e) {
										return w.w(
											n
												.toDate()
												[
													t
												].apply(n.toDate("s"), (r ? [0, 0, 0, 0] : [23, 59, 59,
																999]).slice(e)),
											n,
										);
									},
									M = this.$W,
									m = this.$M,
									v = this.$D,
									D = "set" + (this.$u ? "UTC" : "");
								switch (h) {
									case c:
										return r ? l(1, 0) : l(31, 11);
									case f:
										return r ? l(1, m) : l(0, m + 1);
									case u:
										var p = this.$locale().weekStart || 0,
											g = (M < p ? M + 7 : M) - p;
										return l(r ? v - g : v + (6 - g), m);
									case o:
									case d:
										return $(D + "Hours", 0);
									case a:
										return $(D + "Minutes", 1);
									case s:
										return $(D + "Seconds", 2);
									case i:
										return $(D + "Milliseconds", 3);
									default:
										return this.clone();
								}
							}),
							(v.endOf = function (t) {
								return this.startOf(t, !1);
							}),
							(v.$set = function (t, e) {
								var n,
									u = w.p(t),
									h = "set" + (this.$u ? "UTC" : ""),
									l = ((n = {}),
									(n[o] = h + "Date"),
									(n[d] = h + "Date"),
									(n[f] = h + "Month"),
									(n[c] = h + "FullYear"),
									(n[a] = h + "Hours"),
									(n[s] = h + "Minutes"),
									(n[i] = h + "Seconds"),
									(n[r] = h + "Milliseconds"),
									n)[u],
									$ = u === o ? this.$D + (e - this.$W) : e;
								if (u === f || u === c) {
									var M = this.clone().set(d, 1);
									M.$d[l]($),
										M.init(),
										(this.$d = M.set(d, Math.min(this.$D, M.daysInMonth())).$d);
								} else l && this.$d[l]($);
								return this.init(), this;
							}),
							(v.set = function (t, e) {
								return this.clone().$set(t, e);
							}),
							(v.get = function (t) {
								return this[w.p(t)]();
							}),
							(v.add = function (r, h) {
								var d,
									l = this;
								r = Number(r);
								var $ = w.p(h),
									M = function (t) {
										var e = S(l);
										return w.w(e.date(e.date() + Math.round(t * r)), l);
									};
								if ($ === f) return this.set(f, this.$M + r);
								if ($ === c) return this.set(c, this.$y + r);
								if ($ === o) return M(1);
								if ($ === u) return M(7);
								var m =
										((d = {}), (d[s] = e), (d[a] = n), (d[i] = t), d)[$] || 1,
									v = this.$d.getTime() + r * m;
								return w.w(v, this);
							}),
							(v.subtract = function (t, e) {
								return this.add(-1 * t, e);
							}),
							(v.format = function (t) {
								var e = this,
									n = this.$locale();
								if (!this.isValid()) return n.invalidDate || l;
								var r = t || "YYYY-MM-DDTHH:mm:ssZ",
									i = w.z(this),
									s = this.$H,
									a = this.$m,
									o = this.$M,
									u = n.weekdays,
									f = n.months,
									h = function (t, n, i, s) {
										return (t && (t[n] || t(e, r))) || i[n].slice(0, s);
									},
									c = function (t) {
										return w.s(s % 12 || 12, t, "0");
									},
									d =
										n.meridiem ||
										function (t, e, n) {
											var r = t < 12 ? "AM" : "PM";
											return n ? r.toLowerCase() : r;
										},
									$ = {
										YY: String(this.$y).slice(-2),
										YYYY: this.$y,
										M: o + 1,
										MM: w.s(o + 1, 2, "0"),
										MMM: h(n.monthsShort, o, f, 3),
										MMMM: h(f, o),
										D: this.$D,
										DD: w.s(this.$D, 2, "0"),
										d: String(this.$W),
										dd: h(n.weekdaysMin, this.$W, u, 2),
										ddd: h(n.weekdaysShort, this.$W, u, 3),
										dddd: u[this.$W],
										H: String(s),
										HH: w.s(s, 2, "0"),
										h: c(1),
										hh: c(2),
										a: d(s, a, !0),
										A: d(s, a, !1),
										m: String(a),
										mm: w.s(a, 2, "0"),
										s: String(this.$s),
										ss: w.s(this.$s, 2, "0"),
										SSS: w.s(this.$ms, 3, "0"),
										Z: i,
									};
								return r.replace(M, function (t, e) {
									return e || $[t] || i.replace(":", "");
								});
							}),
							(v.utcOffset = function () {
								return 15 * -Math.round(this.$d.getTimezoneOffset() / 15);
							}),
							(v.diff = function (r, d, l) {
								var $,
									M = w.p(d),
									m = S(r),
									v = (m.utcOffset() - this.utcOffset()) * e,
									D = this - m,
									p = w.m(this, m);
								return (
									(p =
										(($ = {}),
										($[c] = p / 12),
										($[f] = p),
										($[h] = p / 3),
										($[u] = (D - v) / 6048e5),
										($[o] = (D - v) / 864e5),
										($[a] = D / n),
										($[s] = D / e),
										($[i] = D / t),
										$)[M] || D),
									l ? p : w.a(p)
								);
							}),
							(v.daysInMonth = function () {
								return this.endOf(f).$D;
							}),
							(v.$locale = function () {
								return g[this.$L];
							}),
							(v.locale = function (t, e) {
								if (!t) return this.$L;
								var n = this.clone(),
									r = Y(t, e, !0);
								return r && (n.$L = r), n;
							}),
							(v.clone = function () {
								return w.w(this.$d, this);
							}),
							(v.toDate = function () {
								return new Date(this.valueOf());
							}),
							(v.toJSON = function () {
								return this.isValid() ? this.toISOString() : null;
							}),
							(v.toISOString = function () {
								return this.$d.toISOString();
							}),
							(v.toString = function () {
								return this.$d.toUTCString();
							}),
							m
						);
					})(),
					O = L.prototype;
				return (
					(S.prototype = O),
					[
						["$ms", r],
						["$s", i],
						["$m", s],
						["$H", a],
						["$W", o],
						["$M", f],
						["$y", c],
						["$D", d],
					].forEach(function (t) {
						O[t[1]] = function (e) {
							return this.$g(e, t[0], t[1]);
						};
					}),
					(S.extend = function (t, e) {
						return t.$i || (t(e, L, S), (t.$i = !0)), S;
					}),
					(S.locale = Y),
					(S.isDayjs = y),
					(S.unix = function (t) {
						return S(1e3 * t);
					}),
					(S.en = g[p]),
					(S.Ls = g),
					(S.p = {}),
					S
				);
			})();
			var n = e.exports,
				r = { exports: {} };
			!(function (t, e) {
				t.exports = (function () {
					var t = {
							LTS: "h:mm:ss A",
							LT: "h:mm A",
							L: "MM/DD/YYYY",
							LL: "MMMM D, YYYY",
							LLL: "MMMM D, YYYY h:mm A",
							LLLL: "dddd, MMMM D, YYYY h:mm A",
						},
						e =
							/(\[[^[]*\])|([-_:/.,()\s]+)|(A|a|YYYY|YY?|MM?M?M?|Do|DD?|hh?|HH?|mm?|ss?|S{1,3}|z|ZZ?)/g,
						n = /\d\d/,
						r = /\d\d?/,
						i = /\d*[^-_:/,()\s\d]+/,
						s = {},
						a = function (t) {
							return (t = +t) + (t > 68 ? 1900 : 2e3);
						},
						o = function (t) {
							return function (e) {
								this[t] = +e;
							};
						},
						u = [
							/[+-]\d\d:?(\d\d)?|Z/,
							function (t) {
								(this.zone || (this.zone = {})).offset = (function (t) {
									if (!t) return 0;
									if ("Z" === t) return 0;
									var e = t.match(/([+-]|\d\d)/g),
										n = 60 * e[1] + (+e[2] || 0);
									return 0 === n ? 0 : "+" === e[0] ? -n : n;
								})(t);
							},
						],
						f = function (t) {
							var e = s[t];
							return e && (e.indexOf ? e : e.s.concat(e.f));
						},
						h = function (t, e) {
							var n,
								r = s.meridiem;
							if (r) {
								for (var i = 1; i <= 24; i += 1)
									if (t.indexOf(r(i, 0, e)) > -1) {
										n = i > 12;
										break;
									}
							} else n = t === (e ? "pm" : "PM");
							return n;
						},
						c = {
							A: [
								i,
								function (t) {
									this.afternoon = h(t, !1);
								},
							],
							a: [
								i,
								function (t) {
									this.afternoon = h(t, !0);
								},
							],
							S: [
								/\d/,
								function (t) {
									this.milliseconds = 100 * +t;
								},
							],
							SS: [
								n,
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
							s: [r, o("seconds")],
							ss: [r, o("seconds")],
							m: [r, o("minutes")],
							mm: [r, o("minutes")],
							H: [r, o("hours")],
							h: [r, o("hours")],
							HH: [r, o("hours")],
							hh: [r, o("hours")],
							D: [r, o("day")],
							DD: [n, o("day")],
							Do: [
								i,
								function (t) {
									var e = s.ordinal,
										n = t.match(/\d+/);
									if (((this.day = n[0]), e))
										for (var r = 1; r <= 31; r += 1)
											e(r).replace(/\[|\]/g, "") === t && (this.day = r);
								},
							],
							M: [r, o("month")],
							MM: [n, o("month")],
							MMM: [
								i,
								function (t) {
									var e = f("months"),
										n =
											(
												f("monthsShort") ||
												e.map(function (t) {
													return t.slice(0, 3);
												})
											).indexOf(t) + 1;
									if (n < 1) throw new Error();
									this.month = n % 12 || n;
								},
							],
							MMMM: [
								i,
								function (t) {
									var e = f("months").indexOf(t) + 1;
									if (e < 1) throw new Error();
									this.month = e % 12 || e;
								},
							],
							Y: [/[+-]?\d+/, o("year")],
							YY: [
								n,
								function (t) {
									this.year = a(t);
								},
							],
							YYYY: [/\d{4}/, o("year")],
							Z: u,
							ZZ: u,
						};
					function d(n) {
						var r, i;
						(r = n), (i = s && s.formats);
						for (
							var a = (n = r.replace(
									/(\[[^\]]+])|(LTS?|l{1,4}|L{1,4})/g,
									function (e, n, r) {
										var s = r && r.toUpperCase();
										return (
											n ||
											i[r] ||
											t[r] ||
											i[s].replace(
												/(\[[^\]]+])|(MMMM|MM|DD|dddd)/g,
												function (t, e, n) {
													return e || n.slice(1);
												},
											)
										);
									},
								)).match(e),
								o = a.length,
								u = 0;
							u < o;
							u += 1
						) {
							var f = a[u],
								h = c[f],
								d = h && h[0],
								l = h && h[1];
							a[u] = l ? { regex: d, parser: l } : f.replace(/^\[|\]$/g, "");
						}
						return function (t) {
							for (var e = {}, n = 0, r = 0; n < o; n += 1) {
								var i = a[n];
								if ("string" == typeof i) r += i.length;
								else {
									var s = i.regex,
										u = i.parser,
										f = t.slice(r),
										h = s.exec(f)[0];
									u.call(e, h), (t = t.replace(h, ""));
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
								})(e),
								e
							);
						};
					}
					return function (t, e, n) {
						(n.p.customParseFormat = !0),
							t && t.parseTwoDigitYear && (a = t.parseTwoDigitYear);
						var r = e.prototype,
							i = r.parse;
						r.parse = function (t) {
							var e = t.date,
								r = t.utc,
								a = t.args;
							this.$u = r;
							var o = a[1];
							if ("string" == typeof o) {
								var u = !0 === a[2],
									f = !0 === a[3],
									h = u || f,
									c = a[2];
								f && (c = a[2]),
									(s = this.$locale()),
									!u && c && (s = n.Ls[c]),
									(this.$d = (function (t, e, n) {
										try {
											if (["x", "X"].indexOf(e) > -1)
												return new Date(("X" === e ? 1e3 : 1) * t);
											var r = d(e)(t),
												i = r.year,
												s = r.month,
												a = r.day,
												o = r.hours,
												u = r.minutes,
												f = r.seconds,
												h = r.milliseconds,
												c = r.zone,
												l = new Date(),
												$ = a || (i || s ? 1 : l.getDate()),
												M = i || l.getFullYear(),
												m = 0;
											(i && !s) || (m = s > 0 ? s - 1 : l.getMonth());
											var v = o || 0,
												D = u || 0,
												p = f || 0,
												g = h || 0;
											return c
												? new Date(
														Date.UTC(M, m, $, v, D, p, g + 60 * c.offset * 1e3),
													)
												: n
													? new Date(Date.UTC(M, m, $, v, D, p, g))
													: new Date(M, m, $, v, D, p, g);
										} catch (t) {
											return new Date("");
										}
									})(e, o, r)),
									this.init(),
									c && !0 !== c && (this.$L = this.locale(c).$L),
									h && e != this.format(o) && (this.$d = new Date("")),
									(s = {});
							} else if (o instanceof Array)
								for (var l = o.length, $ = 1; $ <= l; $ += 1) {
									a[1] = o[$ - 1];
									var M = n.apply(this, a);
									if (M.isValid()) {
										(this.$d = M.$d), (this.$L = M.$L), this.init();
										break;
									}
									$ === l && (this.$d = new Date(""));
								}
							else i.call(this, t);
						};
					};
				})();
			})(r);
			var i = r.exports;
			n.extend(i);
			t("parseDate", (t, e) => {
				let r = !1;
				if (e)
					switch (e) {
						case "ISO_8601":
							r = t;
							break;
						case "RFC_2822":
							r = n(t.slice(5), "DD MMM YYYY HH:mm:ss ZZ").unix();
							break;
						case "MYSQL":
							r = n(t, "YYYY-MM-DD hh:mm:ss").unix();
							break;
						case "UNIX":
							r = n(t).unix();
							break;
						default:
							r = n(t, e, !0).valueOf();
					}
				return r;
			});
		},
	};
});
//# sourceMappingURL=date-ac7cc82e.js.map
