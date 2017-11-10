<?php
	//this is test php code
	$lang = isset($_GET['lang'])? $_GET['lang'] : 'bg';
	file_put_contents('lang.txt', $lang);
	$phrases = array(
		'title' => array('en'=> "Student council of 23 high school!", 'bg'=> "Ученически съвет на 23 СУ"),
	);
	
	$title = $phrases['title'][$lang];
	
	if($lang == 'en') {
		$label = "БГ";
		$link = '?lang=bg';
	} else {
		$label = "EN";
		$link = '?lang=en';
	}
	//connection
	$cid = mysqli_connect("localhost", "sou32_deni", "CWu#6m@t2k8M", "sou32_deni");
	mysqli_query($cid, "SET NAMES 'utf8'");

	//events
	$eventList = [];
	if($result = mysqli_query($cid, "SELECT * FROM event WHERE lang='".mysqli_real_escape_string($cid, $lang)."' ORDER BY date ASC")) {
		while ($row = mysqli_fetch_assoc($result)){
        	$eventList[] = $row;
    	}
	    $result->close();
	}
  // about
    $aboutList = [];
  if($result = mysqli_query($cid, "SELECT * FROM about WHERE lang='".mysqli_real_escape_string($cid, $lang)."' ORDER BY title ASC")) {
    while ($row = mysqli_fetch_assoc($result)){
          $aboutList[] = $row;
      }
      $result->close();
  }


	//one time
	mysqli_close($cid);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title><?=$title?></title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="icon" type="image/gif" href="favicon.ico" />
<link rel="stylesheet" href="en-us23su.css" />
<link rel="stylesheet" type="text/css" href="us23su.css">
<script>
//var lang = localStorage.getItem('lang') || 'bg';
//self.location.href = 'index-'+lang+'.html';
</script>
</head>
<body>
<header>
  <div>
    <button  type="button" onclick="document.getElementById('nav').classList.toggle('active-nav')"></button>
  </div>
  <nav id="nav">
<?php	if($lang == 'en') { ?>
    <a href="#">HOME</a>
    <a href="about.php">ABOUT US</a>
    <a href="#rules">RULES</a>
    <a href="#events">EVENTS</a>
    <a href="#contacts">CONTACTS</a>
    <a href="http://www.23su.info">23 HIGH SCHOOL</a>
    <a style="width: auto; padding-left: 10px; padding-right: 10px" href="<?=$link?>">BG</a>
<?php	} else { ?>
    <a href="#">НАЧАЛО</a>
    <a href="about.php">ЗА НАС</a>
    <a href="#rules">УСТАВ</a>
    <a href="#events">СЪБИТИЯ</a>
    <a href="#contacts">КОНТАКТИ</a>
    <a href="http://www.23su.info">САЙТА НА 23 СУ</a>
    <a style="width: auto; padding-left: 10px; padding-right: 10px" href="<?=$link?>">EN</a>
<?php	} ?>
  </nav>
  <!-- slideshow-->
  <section id="test" onmouseover="slide.pause()" onmouseout="slide.resume()">
	  <div class="slideshow">
	    <img src="slideshow-1.jpg">
	    <div class="text">
<?php		if($lang == 'en') { ?>
		     	<h2>Teamwork</h2>
		      	<p>The students democratically make important decisions</p>	
<?php		} else { ?>
		      	<h2>Работа в екип</h2>
		      	<p>Учениците демократично взимат важни решения</p>
<?php		} ?>
	    </div>
	  </div>

	  <div class="slideshow">
	    <img src="slideshow-2.jpg">
	    <div class="text">
<?php 	if($lang == 'en') { ?>
		      <h2>Check out our team</h2>
		      <p>The students democratically make important decisions</p>
		    <?php 	} else { ?>
		      <h2>Вижте нашият екип</h2>
		      <p>Учениците демократично взимат важни решения</p>
<?php 	} ?>
	    </div>
	  </div>
	      
	  <div class="slideshow">
	    <img src="slideshow-3.jpg">
	    <div class="text">
<?php 	if($lang == 'en') { ?>
		      <h2>Students' voice is important</h2>
		      <p>The students democratically make important decisions</p>
		    <?php 	} else { ?>
		      <h2>Гласът на учениците е важен</h2>
		      <p>Учениците демократично взимат важни решения</p>
<?php 	} ?>
	    </div>
	  </div>
	  <!-- indicators for slideshow -->
    <article id="dcont" class="dots"></article>
  </section>
</header>
<main>

  <h1>УЧЕНИЧЕСКИ СЪВЕТ НА 23-ТО СУ</h1>
  <aside>
    <img src="us-pic.png" class="us-pic">
  </aside>
<section class="about-us" onmouseover="slide.pause()" onmouseout="slide.resume()">
<div id="about-us" class="space-section"></div>
	

<?php foreach($aboutList as $about) { ?>
      <article>
        <h3><?=$about['title']?></h3>
        <em><?=$about['subtitle']?></em>
        <p><?=$about['text']?></p>
      </article>
<?php } ?>
</section>
<section class="directory">
  <div class="space-section"></div>
<?php  if($lang == 'en') { ?>
  	 <h2>Directory</h2>
	  <section>
	    <article>
	      <h3>Gabriela Voinishka</h3>
	      <em>Chairman</em>
	      <a data-lightbox="gallery" href="directory-1.jpg"><img src="directory-1.jpg" alt='Chairman of the "Student council"' /></a>
	    </article>
	    <article>
	      <h3>Adelina Koleva</h3>
	      <em>Deputy Chairman</em>
	      <a href="directory-2.jpg"><img src="directory-2.jpg" alt='Deputy Chairman of the "Student council"' /></a>
	    </article>
	    <article>
	      <h3>Valentin Chobanov</h3>
	      <em>Secretary</em>
	      <a href="directory-3.jpg"><img src="directory-3.jpg" alt='Secretary of the Student council' /></a>
	 	</article>
	  </section> 
<?php  } else { ?>
  	<h2>Управителен съвет</h2>
	  <section>
	    <article>
	      <h3>Габриела Войнишка</h3>
	      <em>Председател</em>
	      <a data-lightbox="gallery" href="directory-1.jpg"><img src="directory-1.jpg" alt="Председател на „Управителния съвет“" /></a>
	    </article>
	    <article>
	      <h3>Аделина Колева</h3>
	      <em>Заместник-председател</em>
	      <a href="directory-2.jpg"><img src="directory-2.jpg" alt="Заместник-председател на „Управителния съвет“" /></a>
	    </article>
	    <article>
	      <h3>Валентин Чобанов</h3>
	      <em>Секретар</em>
	      <a href="directory-3.jpg"><img src="directory-3.jpg" alt="Секретар на „Управителния съвет“" /></a>
	 	</article>
	  </section> 
<?php  } ?> 
</section>
<section class="chairmen">
  <div class="space-section"></div>
<?php   if($lang == 'en') { ?>
  <h2>Chairmen of committees</h2>
  <section>
    <article>
      <h3>Tsvetomira Doychenova</h3>
      <em>Public relations</em>
      <img src="chairmen-1.jpg" alt="Председател на „Връзки с обществеността“" />
      <p>Maintains profitable social contacts and updates the School Board website.</p>
    </article>
    <article>
      <h3>Joanna Hristova</h3>
      <em>Events</em>
      <img src="chairmen-2.jpg" alt="Председател на „Събития“" />
      <p>Supports the aims and activities of the Student Council and their filming.</p>
    </article>
    <article>
      <h3>Roman Romanov</h3>
      <em>Rights and obligations</em>
      <img src="chairmen-3.jpg" alt="Председател на „Права и задължения“" />
      <p>Controls work and helps teamwork and compliance with the Statute.</p>
    </article>
<?php   } else { ?>
  <h2>Председатели на комисии</h2>
  <section>
    <article>
      <h3>Цветомира Дойченова</h3>
      <em>Връзки с обществеността</em>
      <img src="chairmen-1.jpg" alt="Председател на „Връзки с обществеността“" />
      <p> Поддържа изгодни социални контакти и обновява сайта на Ученическия съвет.</p>
    </article>
    <article>
      <h3>Йоана Христова</h3>
      <em>Събития</em>
      <img src="chairmen-2.jpg" alt="Председател на „Събития“" />
      <p>Съдейства за целите и дейностите на Ученическия съвет и заснемането им.</p>
    </article>
    <article>
      <h3>Роман Романов</h3>
      <em>Права и задължения</em>
      <img src="chairmen-3.jpg" alt="Председател на „Права и задължения“" />
      <p>Контролира работата и спомага за връзката между екипите и спазването на Устава.</p>
    </article>
<?php   } ?>
  </section>
</section>
<section class="control-committe">
  <div class="space-section"></div>
<?php   if($lang == 'en') { ?>
	  <h2>Control Commission</h2>
	  <p>The Control Commission aims to control and monitor the work of the board of directors and all other committees of Student council.</p>
	  <article>
	    <h3>Georgi Banov</h3>
      <img src="ch1.jpg">
	  </article>
	  <article>
	    <h3>Eleonora Simova</h3>
      <img src="ch2.jpg">
	  </article>
	  <article>
	    <h3>Angel Ivanov</h3>
      <img src="ch3.jpg">
	  </article>
<?php   } else { ?>
	  <h2>Контролна комисия</h2>
	  <p>Контролната комисия има за цел да контролира и наблюдава дейността на управителния съвет и всички останали комисии към УС.</p>
	  <article>
	    <h3>Георги Банов</h3>
      <img src="ch1.jpg">
	  </article>
	  <article>
	    <h3>Елеонора Симова</h3>
      <img src="ch2.jpg">
	  </article>
	  <article>
	    <h3>Ангел Иванов</h3>
      <img src="ch3.jpg">
	  </article>
<?php   } ?>
</section>
<section class="rule">
  <i id="rules" class="space-section"></i>
<?php if ($lang == 'en') { ?>
	   <h2>Rules</h2>
	  <em>Adopted on 15.03.2017.</em>
	  <button  type="button" onclick="document.getElementById('rule').classList.toggle('active')">Show/Hide Rules</button>
<?php } else { ?>
	  <h2>Устав</h2>
	  <em>Приет на 15.03.2017г.</em>
	  <button  type="button" onclick="document.getElementById('rule').classList.toggle('active')">Покажи/Скрий Устав</button>
<?php } ?>
  <div id="rule">
  <article>
      <h2>чл.1 Общи положения</h2>
    <p>1. Ученическият съвет (УС) на 23 СУ „Фредерик Жолио-Кюри" е доброволно, младежка, самоуправляваща се, демократична, нерелигиозна и политически независима организация.<br>2. Ученическият съвет е орган на ученическото самоуправление, който дава възможност за публичност и гласност при изявяване интересите на учениците.<br>
      3. Ученическият съвет спомага за организирането на конструктивен диалог с цел подобряването на взаимотношенията ученик-ученик , ученик-учител , ученик-ръководство.<br>
      4. Ученическият съвет работи в съответсвие с Конституцията на България , Закона за народната просвета , Закон за предучилищното и училищното образование , Правилник за устройството и вътрешния ред на училището и Устава на Ученическия съвет.</p>
    <h2>чл.2 Цел и дейност</h2>
    <p>1. Ученическият съвет стимулира учениците в посока изразяване на тяхната позиция и спомага за изграждането на отговорно гражданско поведение.<br>
      2. Ученическият съвет работи за осъвършенстването на училищната среда и спомага за развитието на социалните и академичните умения на учениците.<br>
      3. Ученическият съвет работи за популяризирането и развиването на ученическото самоуправление в училището, с цел пълноценно участие на учениците при взимане на решения, касаещи образователния процес и престоя им в училище.<br>
      4. Ученическият съвет си сътрудничи с останалите ученически парламенти в град София и участва в Софийски Ученически Съвет – СУС.<br>
      5. Защитава правата на учениците в 23СУ“Фредерик Жолио-Кюри“ в съответствие с правилника на училището и международните конвенции за правата на детето и човека.<br>
      6. Представлява учениците пред други институции.<br>
      7. Дейността на УС задължително се съгласува с Годишният план за дейностите на УС, изготвен в началото на всяка учебна година.
    </p>
    <h2>чл.3 Членство</h2>
    <p><strong>1. Право на членство в Ученическия съвет има:</strong><br>
      1.1 Всеки ученик от пети до единадесети клас на 23 СУ „Фредерик Жолио-Кюри".<br>
      1.2 Учениците от дванадесети клас имат право да присъстват и да предоставят помощтта си в качеството си на съветници на УС.<br>
      1.3 Всеки член на УС, който е излъчен от определен клас се избират след демократичен избор на съответния клас.<br><br>
    <strong>2. Приемане на нови членове:</strong><br>
      2.1 Нови членове се приемат от Общото събрание, след демократично гласуване.<br>
      2.2 Класните ръководители оказват съдействие при осведомяването на учениците за дейността на Ученическия съвет и при избиране на представители на класовете.
    </p>
    <h2>чл.4 Прекратяване на членство</h2>
    <p>1. Всеки член може да напусне Ученическия съвет по собствено желание и с предварителна обосновка.<br>
      2. Всеки член може да бъде изключен от Ученическия съвет при системно нарушaване на Етичния кодекс.<br>
      3. Всеки член напуска задължително Ученическия съвет при завършване на образованието си в 23СУ „Фредерик Жолио-Кюри".<br>
      4. Всеки член на Ученическия съвет бива лишен от право на членство при 3 необосновани отсъствия от срещи на комисията по преценка на Управителния съвет.<br>
      5. Всеки член бива изключен от Ученическия съвет по желание на мнозинството от съответния клас, който той представлява, с предварителна обосновка и одобрение от Управителния съвет на Ученическия съвет.</p>
    <h2>чл.5 Права</h2>
    <p>1. Да избира и да бъде избиран за член на Управителния съвет.<br>
      2. Да гласува с един глас по всички въпроси, подложени на гласуване по време на срещи на комисията, в която членува и Общото събрание.<br>
      3. Да е член на една комисия.<br>
      4. Да предлага и участва в разработването и реализирането дейностите на съвета, както и да търси подкрепа при реализирането на свои проекти, припокриващи се с общите цели на организацията.<br>
      5. Да изразява позиция безпристрастно и свободно по всички въпроси и проблеми, касаещи работния процес на съвета , както и цялостния образователен процес.<br>
      6. Да предлага промени в настоящия Устав на Общо събрание.
    </p>
    <h2>чл.6 Задължения</h2>
    <p>1. Да участва редовно в събранията на Ученическия съвет.<br>
      2. Да спазва настоящия Устав и Етичния кодекс.<br>
      3. Да изпълнява решенията, взети на Общо събрание и от Управителния съвет.<br>
      4. Да съдейства за постигането на целите на Ученическия съвет.<br>
      5. Да изразява мнението на своите съученици.
    </p>
    <h2>чл.7 Етичен кодекс</h2>
    <p>Следният Етичен кодекс има за цел да гарантира ефективната и безпрепятствена работа на Ученическия съвет. Всеки член следва да го спазва. При незачитане на заложените в Етичния кодекс правила, всеки член бива санкциониран спрямо Наказателния кодекс на Ученическия съвет и установените норми и правила в него.<br>  <br>
      <strong>1. Всеки член на Ученическия съвет по време на Общо събрание, Управителен съвет или среща на комисията, в която участва, трябва:</strong><br>
      1.1 Да спазва умерен и възпитан тон, като не прекъсва, не обижда и не нанася телесни повреди на друг член на Ученическия съвет.<br>
      1.2 Да изразява мнение или да дава предложение, ако му е дадено правото на реплика. Ако има членове на Ученическия съвет , които не са съгласни с репликата, имат право на дуплика.<br>
      1.3 Да проявява толерантност и уважение спрямо останалите членове на Ученическия съвет.<br>
      1.4 Да базира взаимоотношенията си с останалите членове на база на взаимопомощ и сътрудничество.<br>
      1.5 Да спазва задължителен формален етикет на Общо събрание.<br>
      1.6 Да не разпространява информация за предстоящи събития и инициативи на Ученическия съвет, ако те все още не са одобрени от Управителния съвет.<br>
      1.7 Да не злоупотребява с правомощията, делегирани му от Ученическия съвет.
    </p>
    <h2>чл.8 Наказателен кодекс</h2>
    <p>
    <strong>1. Отстраняване на член на Ученическия съвет от среща на комисията или Общо събрание се разглежда от Управителния съвет при следните ситуации:</strong><br>
    1.1 Всеки присъстващ на Общо събрание би могъл да бъде отстранен от заседание по преценка на Управителния съвет.<br>
    1.2 Всеки член на комисия би могъл да бъде отстранен от заседание по преценка на председателя и заместник-председателя на съответната комисия.<br>
    1.3 Всеки присъстващ на Общо събрание би могъл да бъде отстранен от координатора на Общото събрание при установяване на нарушение на Етичния кодекс.<br><br>
    <strong>2. Отстраняване на член от Ученическия съвет може да стане по следните основания:</strong><br>
    2.1 При 3 неоснователни отсъствия от Общи събрания и 3 такива от срещи на комисия.<br>
    2.2 Системно неспазване на Устава и Етичния кодекс на Ученическия съвет.<br>
    2.3 При системно неизпълнение на задачите, поставени от съвета. (Председател и заместник-председател на комисията , Управителен съвет)<br>
    2.4 При установяване на нарушение на законовите разпоредби на Република България. (Конституция, Закон за образованието, Закон за народната просвета, разпоредби на МОН и РУО)<br><br>
    <strong>3. Процедура за отстраняване на член на Ученическия съвет:</strong><br>
    3.1 Всеки член на Ученическия съвет може да бъде предложен за изключване от председателя или от член на комисията, в която членува.<br>
    3.2 Предложението се разглежда от Управителния съвет.<br>
    3.3 По преценка на Управителния съвет в конкретни ситуации има възможност предложеният да бъде временно отстранен.<br><br>
    <strong>4. Процедура за отстраняване на член на Управителния съвет:</strong><br>
    4.1 Председателят, заместник-председателят и секретарят на Ученическия съвет могат да бъдат предложени за изключване от всеки член на Ученическия съвет след предварителна обосновка на предложението пред Управителния съвет. Гласува се на Общо събрание, като всеки член има право на един глас. Решение се счита за взето, когато над 50% от гласовете са в полза на едната страна.<br>
    4.2 Всеки председател на комисия може да бъде предложен за изключване от Управителния съвет или от член на комисията, на която е председател. Управителният съвет и съответната комисия следва да разгледат предложението и да вземат общо решение.
  </p>
  <h2>чл.9 Структура</h2>
  <p>
    Висш орган на управление на УС е Общото събрание(ОСУС)<br><br>
    <strong>1. Управителен съвет:</strong><br>
    1.1 Избира се на избори в началото на учебната година.<br>
    1.2 Състои се от председател, заместник председател, секретар и председателите на комисиите.<br>
    1.3 Управителният съвет взима решения, касаещи промени в устава, които могат да влязат в сила само след одобрение с мнозинство в Общо събрание на Ученическия съвет.<br>
    1.4 Управителният съвет координира срещите и дейностите на Ученическия съвет.<br>
    1.5 Управителният съвет има право да предлага за изключване от Ученическия съвет всеки член след предварителна обосновка.<br>
    1.6 Определя с демократично гласуване разпределянето на различни длъжностти в комисиите. <br><br>
    <strong>2. Председател на Ученическия съвет:</strong><br>
    2.1 Избира се на избори в началото на учебната година.<br>
    2.2 Председателят представлява Ученическия съвет пред всички организации, органи, общественост и т.н.<br>
    2.3 Председателят оглавява Управителния съвет.<br>
    2.4 Председателят няма право да изразява пристрастност при вземане на решения и при работата си с други членове.<br>
    2.5 Председателят няма право да участва в други организации с политическа и религиозна обвързаност.<br>
    2.6 Председателят има право да свиква Управителен съвет и Общо събрание.<br>
    2.7 За Председател на УС на 23“Фредерик Жолио-Кюри“ може да бъде избран ученик, навършил 16 години.<br>
    2.8 Председателят не може да бъде представител на своя клас пред УС.<br>
    2.9 Председателят може да бъде преизбран само веднъж.<br><br>
    <strong>3. Заместник-председател на Ученически съвет:</strong><br>
    3.1 Избира се на избори в началото на учебната година. <br>
    3.2 Заместник-председателят представлява Ученическия съвет заедно с председателя пред всички организации, органи, общественост и т.н.<br>
    3.3 Заместник-председателят замества председателя при негово отсъствие и изпълнява всичките му функции.<br>
    3.4 Заместник -председателя е член на Управителния съвет.<br>
    3.5 Заместник-председателят няма право да изразява пристрастност при вземане на решения и при работата си с други членове.<br>
    3.6 Заместник-председателят няма право да участва в други организации с политическа и религиозна обвързаност.<br>
    3.7 Зам. Председателят не може да бъде представител на своя клас пред УС.<br>
    3.8 Зам. Председателят може да бъде преизбран само веднъж.<br><br>
    <strong>4. Секретар на Ученически съвет:</strong>
    4.1 Избира се на избори в началото на учебната година. <br>
    4.2 Води стриктна документация.<br>
    4.3 Секретарят няма право да изразява пристрастност при вземане на решения и при работата си с други членове.<br>
    4.4 Секретарят няма право да участва в други организации с политическа и религиозна обвързаност.<br>
    4.5 Секретарят е длъжен да предостави достъп до документите на съвета на всеки член при поискване.<br>
    4.6 Секретарят на УС не може да представлява класа си пред УС.<br><br>
    <strong>5. Председател на комисия:</strong><br>
    5.1 Избира се от съответната комисия и Управителнен съвет/ от всички членове на Ученическият съвет събрани на Общото събрание.<br>
    5.2 Води срещите на комисията, която оглавява.<br>
    5.3 Поддържа добрия тон и добрите отношения между членовете на комисията.<br>
    5.4 При конфликт или неразбирателство в комисията, председателят е длъжен да осведоми Управителния съвет, за да бъдат избегнати последствия, оронващи доброто име на Ученическия съвет и/или нарушаващи работния процес.<br>
    5.5 Няма право да изразява пристрастност при вземане на решения и при работата си с други членове.
  </p>
  <h2>чл.10 Процедури</h2>
  <p>
    <strong>1. Общо събрание:</strong><br>
    1.1 Провежда се минимум един път на месец.  <br>
    1.2 Състои се от всички членове на Ученическия съвет.<br>
    1.3 Гласува промени в Устава, одобрени от Управителния съвет, при присъствие от над 80% и мнозинство от над 50%. <br>
    1.4 Избира членовете на Управителния съвет (Председател, Зам. Председател, Секретар и Председателите на комисии) с провеждането на анонимен вот и при мнозинство от над 50%.<br>
    1.5 Гласува промени в годишния план и бюджет с мнозинство от над 50%.<br>
    1.6 Предлага и гласува различни проекти, тяхното изпълнение и финансиране при мнозинство от над 50%, при пълен или непълен кворум.<br>
    1.7 Гласува вот на недоверие към Председателя и Зам. Председателя с предварителна обосновка и с мнозинство от над 50% при пълен или непълен кворум.<br><br>
    <strong>2. Избори:</strong>
    2.1 Провеждат се в началото на учебната година.<br>
    2.2 Избират се членовете на Управителен съвет. (Председател, Заместник-председател, Секретар и Председатели на комисиите) с мнозинство от над 50% и при пълен кворум.<br>
    2.3 Определя мандат с продължителност една астрономическа година, считано от месец сепрември.<br><br>
    <strong>3.Оттегляне от ръководен пост:</strong>
    3.1 Пълноощията на Председателя, Зам. Председателя, Секретарят и Председателите на комисии  се прекратяват предсрочно при:<br>
    -Доброволно отказване от поста, мотивирано с писмено или лично обяснение.<br>
    -Трайна невъзможност да изпълнява правомощията си , поради заболяване.<br>
    -Гласуване вот на недоверие от Общото събрание.
 </p>
 <h2>чл.11 Комисии</h2>
  <p>1. Приемат членове след края на обучителния период и подаване на декларация за постъпване в комисия.<br>
    2. Разпределят длъжностите чрез демократично гласуване на Управителния съвет.<br><br>
    <strong>3. Комисия „Събития":</strong><br>
    3.1 Да заснема събитията, организирани от Ученическия съвет.<br>
    3.2 Да съдейства за осъществяването на целите и дейностите на Ученическия съвет.<br>
    3.3 Да раздава флаери, листовки, визитки и други рекламни материали.<br>
    3.4 Да предлага иновативни инициативи от различен характер:<br>
    - Благотворителен<br>
    - Екологичен<br>
    - Развлекателен<br><br>
    <strong>4. Комисия „Връзки с обществеността":</strong><br>
    4.1 Да изразява публично мнението на Ученическия съвет.<br>
    4.2 Да търси и поддържа изгодни социални контакти.<br>
    4.3 Да обновява сайта на Ученическия съвет.<br>
    4.4 Да поддържа постоянно обратна връзка с учениците, с цел даване гласност на проблемите и идеите им.<br><br>
    <strong>5. Комисия „Права и задължения":</strong><br>
    5.1 Занимава се с усъвършенстването на процесите на работа и Устава на Ученическия съвет.<br>
    5.2 Следи за спазването на Устава на Ученическия съвет.<br>
    5.3 Контролира работата и спомага за връзката между екипите.<br>
    5.4 Да информира председателя, заместник – председателя и лицата, отговорни за Ученическия съвет, за случващото се в него.<br><br>
    <strong>6.Контролна комисия:</strong><br>
    6.1 Състои се от трима независими члена на Ученическия съвет.<br>
    6.2 Контролната комисия има за цел да контролира и наблюдава дейността на управителния съвет и всички останали комисии към УС. <br>
    6.3 При установяване на нарушения в дейността на Управителния съвет и/или на някоя от комисиите, членовете на Контролната комисия са длъжни да уведомят всички членове на УС, на Общото събрание както и лицата отговорни за Ученическият съвет.<br>
    6.4 При нужда   Контролната комисия може да свика извънредно събрание на Управителния съвет на УС и да представи своите наблюдения върху дейността на комисията или лицето изпълняващо ръководна позиция, което е в нарушение.<br>
    6.5 Членовете на Контролната комисия  са независими, не членуват в други кмисии, и могат да присъстват на всяко събиране на Управиелния съвет и всички останали комисии.<br>
    6.6 Членовете на Контролната комисия са демократично избрани с мнозинство от НАД 50% на Общото събрание на Ученическия Съвет.
  </p>
  <h2>Чл. 12 Правилник за прилагане на устава</h2>
    <p>1.Всеки член на УС е длъжен да изпълнява задълженията си, определени с този устав, <br>
      2.Нито един член на УС нчма право да уронва престижа на 23СУ“Фредерик
      Жолио-Кюри“, и да накърнява достойнството на други ученици, учители и служители на училището.
    </p>
    </article>
    </div>
</section>
<section id="events" class="events">
  <div id="events" class="space-section"></div>
    <h2>Events</h2>
  <em>Our initiatives</em>
  <section>
<?php foreach($eventList as $event) { ?>
   		<article>
	      <h3><?=$event['name']?></h3>
	      <em><?=$event['date']?></em>
	      <img src="<?=$event['image']?>" alt="<?=$event['name']?>" />
	      <p><?=$event['text']?></p>
	    </article>
<?php } ?>
	</section>
<?php //include('events.'.$lang.'.php')?>
</section>
<section class="contact">
  <div id="contacts" class="space-section"></div>
<?php if($lang == 'en') { ?>
	  <h2>Contact</h2>
	  <em>Contact us</em>
	  <section>
	    <article>
	      <i>Sofia, Bulgaria</i>
	      <i>Telephone: 02 944 2781</i>
	      <i>Email: us23su@abv.bg</i>
	    </article>
	    <article>
      <form method="post" name="contact_form" action="contact-form-handler.php">
        <input name="name" placeholder="Name" />
        <input name="email" placeholder="Email" />
        <textarea name="message" placeholder="Message (500 words)" maxlength="500" ></textarea>
        <input type="submit" value="Send" />
      </form> 
<?php } else { ?>
	  <h2>Контакт</h2>
	  <em>Свържете се с нас</em>
	  <section>
	    <article>
	      <i>София, България</i>
	      <i>Телефон: 02 944 2781</i>
	      <i>Имейл: us23su@abv.bg</i>
	    </article>
    <article>
      <form method="post" name="contact_form" action="contact-form-handler.php">
        <input name="name" placeholder="Име" />
        <input name="email" placeholder="Имейл" />
        <textarea name="message" placeholder="Съобщение (500 думи)" maxlength="500" ></textarea>
        <input type="submit" value="Изпрати" />
      </form> 
<?php } ?>
    </article>
  </section>
</section>
<section>
  <!--map-->
</section>
</main>
<footer>
<?php   if($lang == 'en') { ?>
 	<p>Designed by Denislav Alexiev, Ivo Manov and Krum Tsvetkov.</p>
<?php   } else { ?>
	<p>Изработено от Денислав Алексиев, Иво Манов и Крум Цветков.</p>
<?php   } ?>
</footer>

<script src="en-us23su.js"> </script>

<script language="JavaScript">
var frmvalidator  = new Validator("contactform");
frmvalidator.addValidation("name","req","Please provide your name");
frmvalidator.addValidation("email","req","Please provide your email");
frmvalidator.addValidation("email","email",
  "Please enter a valid email address");
</script>

</body>
</html>