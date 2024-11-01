// Validation errors messages for Parsley
// Load this after Parsley

Parsley.addMessages("th", {
	defaultMessage: "ค่านี้ดูเหมือนว่าจะไม่ถูกต้อง",
	type: {
		email: "กรุณากรอกอีเมลให้ถูกต้อง",
		url: "กรุณากรอก url ให้ถูกต้อง",
		number: "กรุณากรอกตัวเลข",
		integer: "กรุณากรอกจำนวนเต็ม",
		digits: "กรุณากรอกเลขทศนิยม",
		alphanum: "กรุณากรอกตัวอักษรและตัวเลข",
	},
	notblank: "ห้ามเป็นค่าว่าง",
	required: "จำเป็นต้องกรอก",
	pattern: "รูปแบบไม่ถูกต้อง",
	min: "ต้องมากกว่าหรือเท่ากับ %s",
	max: "ต้องน้อยกว่าหรือเท่ากับ %s",
	range: "ต้องอยู่ระหว่าง %s และ %s",
	minlength: "กรุณากรอกอย่างน้อย %s ตัวอักษร",
	maxlength: "กรอกได้ไม่เกิน %s ตัวอักษร",
	length: "ความยาวตัวอักษรต้องอยู่ระหว่าง %s ถึง %s ตัวอักษร",
	mincheck: "กรุณาเลือกอย่างน้อย %s ตัวเลือก",
	maxcheck: "เลือกได้ไม่เกิน %s ตัวเลือก",
	check: "กรุณาเลือกระหว่าง %s และ %s ตัวเลือก",
	equalto: "ค่าที่กรอกไม่เหมืิอนกัน",
	euvatin: "หมายเลขประจำตัวผู้เสียภาษีไม่ถูกต้อง",
});

Parsley.setLocale("th");
