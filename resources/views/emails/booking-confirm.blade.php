<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>مرحباً {{ $validated['name'] }} 👋</h2>
    <p>تم تأكيد حجزك بنجاح.</p>
    <ul>
        <li>تاريخ الحجز: {{ $validated['date'] }}</li>
        <li> وقت الحجز: {{ $validated['time'] }}</li>
        <li>  عدد الأفراد: {{ $validated['people'] }}</li>
    </ul>
    <p>
        في انتظاركم
        مع تحياتنا، إدارة الفندق
    </p>
</body>
</html>
