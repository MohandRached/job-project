# Mosaned Job Project - Laravel Web App

هذا المشروع جزء من التدريب الميداني، وهو تطبيق ويب تم تطويره باستخدام Laravel لعرض الوظائف من واجهة API محلية.

## 📌 فكرة المشروع
واجهة بسيطة لعرض الوظائف المتاحة للمستخدم، يتم جلب البيانات من API داخلي مبني بلغة Laravel، وتُعرض الوظائف مع التفاصيل في واجهة Blade نظيفة ومتجاوبة.

## 🧰 الأدوات والتقنيات
- PHP 8.1
- Laravel 10
- Laravel Breeze (للتوثيق)
- Tailwind CSS
- Laravel HTTP Client (Guzzle)
- Git & GitHub

## 🚀 خطوات تشغيل المشروع

### 1. استنساخ المشروع
```bash
git clone https://github.com/MohandRached/job-project.git
cd job-project
```

### 2. تثبيت الحزم
```bash
composer install
npm install && npm run dev
```

### 3. إعداد قاعدة البيانات
- أنشئ ملف `.env` عبر نسخ `.env.example`
- ضع بيانات قاعدة البيانات المحلية
- ثم:
```bash
php artisan key:generate
php artisan migrate
```

### 4. تشغيل السيرفر
```bash
php artisan serve
```

> تأكد أيضًا من تشغيل مشروع الـ API على منفذ مختلف مثل:
```bash
php artisan serve --port=8080
```

## 🔗 بيانات الوظائف تأتي من:
```
http://localhost:8080/api/jobs
```

## 💡 ملاحظات مهمة
- المشروع لا يحتوي على تسجيل فعلي للوظائف، فقط عرض من API.
- يمكن تطويره لاحقًا ليتضمن التقديم، المفضلة، وتسجيل الدخول الحقيقي.

## 👨‍💻 الطالب: Mohand Rached
- قسم: تكنولوجيا المعلومات
- الكلية: [اسم الكلية هنا]
