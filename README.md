# Laravel-Employee-Management

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-2025-05-16-02_12_09.png)

Përmbledhje
-----------

**Laravel-Menaxhimi-i-Punonjësve** është një mjet i fuqishëm i krijuar për të thjeshtuar dhe përmirësuar menaxhimin e punonjësve për organizata të të gjitha madhësive.

**Pse Laravel-Menaxhimi-i-Punonjësve?**

Ky projekt thjeshton proceset e HR duke menaxhuar të dhënat e punonjësve, pjesëmarrjen dhe listat e pagave në një vend të vetëm. Disa nga veçoritë kryesore përfshijnë:

* **📊 Menaxhim i Plotë i Punonjësve:** Thjeshton proceset e HR duke mbajtur të dhënat, pjesëmarrjen dhe pagat në një vend të vetëm.

* **🎨 Ndërfaqe Moderne me Tailwind CSS:** Ndërfaqe reaguese dhe vizualisht e këndshme që përmirëson përvojën e përdoruesit.
* **🔔 Njoftime në Kohë Reale:** Informon përdoruesit menjëherë për përditësimet, duke rritur përfshirjen dhe reagimin.
* **🧪 Kuadër i Fortë për Testim:** Siguron cilësi të lartë të kodit përmes testimeve të automatizuara, duke reduktuar gabimet dhe rritur besueshmërinë.
* **🏢 Mbështetje për Multi-Tenancy:** Lejon disa kompani të përdorin aplikacionin në mënyrë të sigurt, duke rritur shkallëzueshmërinë dhe fleksibilitetin.

---

### Detaje

Sistemi i Menaxhimit të Punonjësve është një platformë Software-as-a-Service (SaaS) me arkitekturë multi-tenant. U lejon përdoruesve të menaxhojnë kompani të shumta brenda një databaze të vetme të centralizuar. Çdo përdorues mund të kalojë dhe monitorojë disa kompani duke përdorur të njëjtën databazë. Dizajni garanton izolim të të dhënave, siguri dhe kontroll të lehtë të aksesit.

Sistemi lejon përdoruesit të kryejnë detyra thelbësore për secilën kompani që ata menaxhojnë, si shtimi i punonjësve, caktimi i roleve, ndjekja e listës së pagave dhe vlerësimi i performancës. Me një databazë të unifikuar, reduktohet kompleksiteti i infrastrukturës dhe rritet efikasiteti i përdorimit të burimeve. Struktura e databazës është e përshtatshme për pothuajse çdo kategori kompanie.

**Problemi:**  
Menaxhimi i punonjësve në kompani të ndryshme me aplikacione të ndara është joefikas, i kushtueshëm dhe i prirur për gabime. Çdo kompani ka nevojë për hyrje, databaza dhe platforma të ndryshme, duke çuar në shpërndarje të të dhënave dhe rritje të kostove të mirëmbajtjes.

**Zgjidhja:**  
Databaza SaaS për Menaxhimin e Punonjësve përdor arkitekturë multi-tenant ku një databazë e vetme pret të dhënat për shumë kompani. Përdoruesit kanë akses të kufizuar vetëm në kompanitë e tyre dhe mund të kalojnë mes kompanive pa pasur nevojë për hyrje të shumta. Identifikuesit e tenants ndajnë të dhënat logjikisht dhe aplikojnë kontroll të aksesit të bazuar në role, duke ruajtur sigurinë. Ky konfigurim redukton kostot operacionale, thjeshton backup-et dhe rrit shkallëzueshmërinë e sistemit.

**Veçori kryesore të sistemit përfshijnë:**

* **Menaxhim me shumë departamente:** Kompanitë mund të krijojnë dhe menaxhojnë disa departamente dhe t’u caktojnë punonjësit atyre.
* **Siguria e përdoruesve:** Autentikim me dy faktorë (2FA), rikuperim për fjalëkalimin e harruar dhe hyrje të sigurta.
* **Kërkesat për pushim (PTO):** Punonjësit mund të kërkojnë ditë pushimi, që mund të miratohen nga menaxherët.
* **Check-In/Check-Out:** Punonjësit regjistrojnë orarin e hyrjes dhe daljes nga puna.
* **Detyra të bazuara në projekte:** Punonjësit mund të caktohen në projekte specifike të departamenteve të tyre.
* **Menaxhimi i listës së pagave:** Gjurmim i pagave dhe gjenerim i të dhënave për përpunimin e pagesave.

Si të Filloni
--------------

### Kërkesat Paraprake

Ky projekt kërkon varësitë e mëposhtme:

* **Gjuha programuese:** PHP  
* **Menaxher pakosh:** Composer, Npm

### Instalimi

Ndërtoni Laravel-Menaxhimi-i-Punonjësve nga burimi dhe instaloni varësitë:

1. **Klono depozitën:**

```bash
git clone https://github.com/AlpetGexha/Laravel-Employee-Management
cd Laravel-Employee-Management
composer install
npm install
.cp .env.example .env
php artisan key:generate
php artisan migrate 
php artisan db:seed
```

start the server

```bash
composer run dev
```

# Përdorust

<test@exmple.com>:password

## Screenshots

### Frontend

![Frontend](screenshots/front/screencapture-127-0-0-1-8000-2025-05-16-03_36_25.png)

![Frontend](screenshots/front/screencapture-127-0-0-1-8000-admin-contacts-2025-05-16-03_47_16.png)

![Frontend](screenshots/front/screencapture-127-0-0-1-8000-blog-2025-05-16-03_37_03.png)

![Frontend](screenshots/front/screencapture-127-0-0-1-8000-blog-slug-title-2025-05-16-03_37_24.png)

![Frontend](screenshots/front/screencapture-127-0-0-1-8000-contact-2025-05-16-03_37_40.png)

![Frontend](screenshots/front/screencapture-127-0-0-1-8000-pricing-2025-05-16-03_36_51.png)

![Frontend](screenshots/back/screencapture-127-0-0-1-8000-company-login-2025-05-16-03_45_17.png)

![Frontend](screenshots/back/screencapture-127-0-0-1-8000-company-register-2025-05-16-03_45_28.png)

### Backend

#### Pannel

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-2025-05-16-02_42_59.png)

#### Employees

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-employees-create-2025-05-16-03_57_27.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-p-t-o-s-2025-05-16-02_58_14.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-payrolls-2025-05-16-03_08_42.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-payrolls-create-2025-05-16-03_03_50.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-salary-structures-10-edit-2025-05-16-03_59_40.png)

#### Checkin / Checkout

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-checkin-2025-05-16-02_34_42.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-attendances-2025-05-16-02_42_01.png)

#### Sales Meanagement

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-customers-2025-05-16-02_44_36.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-products-create-2025-05-16-02_45_53.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-sales-2025-05-16-02_46_46.png)

#### Projects

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-projects-4-2025-05-16-03_44_27.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-projects-4-edit-2025-05-16-03_36_11.png)

### Admin

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-2025-05-16-02_42_59.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-admin-contacts-2025-05-16-04_03_50.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-states-2025-05-16-03_18_43.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-cities-2025-05-16-03_19_02.png)

![Backend](screenshots/back/screencapture-127-0-0-1-8000-company-1-countries-2025-05-16-03_17_47.png)

### Punuar nga

* Alpet Gexha 220307141
* Çlirim Allaqi 220307143
* Enes Shehu 220307136

[⬆ Kthehu lart](#top)
