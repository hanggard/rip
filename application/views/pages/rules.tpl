{extend template="template"}
	
	{container name="title"}Памятка администраторам{/container}
	
	{container name="script"}{/container}
	
	{container name="content"}
		<h2>Памятка администраторам</h2>
		<p>Прежде всего, хочу заметить, что основную функцию администратора я вижу даже не в редактировании историй, присланных посетителями сайта, а в самостоятельном поиске и публикации новых историй. Сообщество само по себе присылает довольно мало историй, и качество их часто невысокое, так что только на них сайт не проживёт. Для каждодневного обновления сайта я искал истории на различных тематических сетевых ресурсах и самостоятельно добавлял их на сайт, не дожидаясь текстов от посетителей. Я думаю, надо ежедневно публиковать на сайте хотя бы 1-2 новые истории. Учитывая, что администраторов теперь четверо, вам это, надеюсь, большого труда не составит.</p>
		<p>Ниже я приведу список принципов, которые были выработаны мной для администрирования сайта за эти два года. Многовато, конечно, но я просто изложил всё, что смог вспомнить. :) Соблюдение этих рекомендаций будет способствовать преемственности между старой и новой администрацией.</p>
		<p style="font-size:16px;font-weight:bold;margin:10px 0;">ФОРМАТИРОВАНИЕ ТЕКСТОВ</p>
		<p>На <strong>Kriper.Ru</strong> приняты определённые правила форматирования текстов, отличающие ресурс от других сайтов. Одобряя историю, пожалуйста, убедитесь, что текст соответствует принципам форматирования.</p>
		<p>1) Между любыми двумя строками должна иметься одна пустая строка — это облегчает чтение. Исключение допускается только для стихов и текстов, которые идут сплошным списком (например, логи чатов, как в истории <a href="http://kriper.ru/tale/3266">«Онлайн»</a>).</p>
		<p>2) Чрезмерно длинные тексты, которые будут мешать посетителям прокручивать ленту вниз, следует прятать «под кат». Для этого выберите строку, на которой закончится «аннотационная» часть текста, и поставьте в её конце тэг <strong>[cut]</strong>.</p>
		<p>3) Иногда (весьма редко) автозамена верхних кавычек на типографские «ёлочки» даёт сбой — открывающие и закрывающие кавычки кое-где оказываются перепутанными. В этом случае это следует исправить вручную.</p>
		<p>4) Если текст разделён на части/главы, то между ними должны стоять три звёздочки ( * * * ). Использование нескольких пустых строк нежелательно. Названия глав должны писаться ЗАГЛАВНЫМИ БУКВАМИ.</p>
		<p>5) Если из-за особенностей текста из него нельзя выкорчевать мат, сленг, грубые жаргонизмы или элементы, которые могут быть расценены как порнографические, то об этом следует предупредить читателя в начале текста, поместив дисклеймер наподобие следующего:</p>
		<div style="margin:5px 0;padding:5px;background-color:#999;">ВНИМАНИЕ: в силу своих особенностей данная история не может быть подвергнута редактированию администрацией сайта, так как в этом случае будет утеряна художественная целостность текста. В результате история содержит ненормативную лексику и жаргонизмы. Вы предупреждены.<br /><br />
		------</div>
		<p>Обратите внимание на использование шести дефисов в качестве разделителя между дисклеймером и самой историей. Кроме того, подобные истории должны обязательно иметь метку «без редактирования» (даже если ненормативная лексика там встречается всего раз).</p>
		<p>6) Если история является прямым продолжением опубликованного ранее текста, без чтения которого её полное понимание невозможно, то следует поместить в начале текста дисклеймер наподобие следующего:</p>
		<div style="margin:5px 0;padding:5px;background-color:#999;">Эта история является прямым продолжением ранее опубликованной на сайте истории «ХХХ».<br /><br />
		------</div>
		<p>7) Строки не должны быть разорваны в середине, как бывает с некоторыми текстами, например:</p>
		<div style="margin:5px 0;padding:5px;background-color:#999;">Ей приснился сон: она стояла на краю оживленного шоссе, легковые и грузовые<br />
		автомобили проезжали мимо. Она посмотрела на ту сторону шоссе и увидела знакомую<br />
		фигуру. Это был ее отец. Он держал руки у рта, и, казалось, что-то кричал<br />
		ей, но она не могла разобрать слова.</div>
		<p>Разорванные строки необходимо привести в нормальный вид при редактировании.</p>
		<p>8) Помните, что тире и дефис — разные знаки препинания. В частности, до и после прямой речи должно стоять тире, а не дефис. Если в тексте после тире пропущен пробел (достаточно частая ситуация), то автозамена не сработает, и вам нужно будет вручную править текст. Неправильный вариант:</p>
		<div style="margin:5px 0;padding:5px;background-color:#999;">-Это невозможно,-сказал офицер.</div>
		<p>Правильный вариант:</p>
		<div style="margin:5px 0;padding:5px;background-color:#999;">— Это невозможно, — сказал офицер.</div>
		<p>9) Обращайте особое внимание на наличие пробелов после знаков препинания (запятой, точки и т. д.). Их отсутствие снижает удобство чтения текста и является неверным с точки зрения грамматики.</p>
		<p>10) Помните, что по правилам пунктуации точка в конце предложения может быть либо одна (.), либо их может быть три (...). В присылаемых историях часто встречаются такие знаки препинания, как (..), (....), (.......) и т. д., их следует заменять на более привычные знаки.</p>
		<p style="font-size:16px;font-weight:bold;margin:10px 0;">ОДОБРЕНИЕ И РЕДАКТИРОВАНИЕ</p>
		<p>1) Перед одобрением любой текст должен пройти вычитку у администратора и грамматическую правку. Если грамматическая ошибка будет найдена уже после одобрения (самим администратором или подсказана читателем), то нужно ошибку немедленно исправить.</p>
		<p>2) При одобрении истории в поле «Метки» администратор должен перечислить через запятую метки, относящиеся к данной истории (список меток можно найти на <a href="http://kriper.ru/tags">этой странице</a>). Теоретически можно ввести любую новую метку, но рекомендуется использовать одну из существующих, т. к. при создании новой метки следовало бы задним числом проставить её всем опубликованным на сайте историям, к которым её можно применить, но ведь это процесс трудоёмкий...</p>
		<p>3) Ненормативная лексика (кроме случаев, когда без неё история теряет художественную целостность) должна быть либо заменена эвфемизмами («хрен», «чёрт», «долбаный» и т. д.), либо, если употребление эвфемизма в конкретном случае нежелательно, зацензурена звёздочками по количеству пропущенных букв («х**», «б****»).</p>
		<p>4) Грубые жаргонизмы и сленг (например, уголовная «феня») также нежелательны, их тоже лучше заменить на более приличные слова, если позволяет история.</p>
		<p>5) Несущественную вводную часть истории, где автор приветствует посетителей сайта, рассказывает о себе сведения, которые не имеют значения в контексте самой истории и т. д., можно убрать.</p>
		<p>6) Если в тексте истории есть отдельные логические ошибки, сюжетные дыры, ляпы, анахронизмы и т. д., то администратор может исправить ошибку самостоятельно либо оставить её на совести автора по своему усмотрению.</p>
		<p>7) Отправляя текст в «тёмную комнату», некоторые посетители пишут в поле «Автор» своё имя/ник, хотя они не сочиняли этот текст. Такое следует пресекать, удаляя имя лжеавтора из поля «Автор» и по возможности выставляя там имя истинного автора.</p>
		<p>8) Если в истории указан первоисточник, то ссылка должна вести напрямую на саму историю, а не, например, на главную страницу сайта. Если по ссылке текст не находится, то ссылку на первоисточник следует удалить.</p>
		<p style="font-size:16px;font-weight:bold;margin:10px 0;">КАКИЕ ИСТОРИИ НЕОБХОДИМО УДАЛЯТЬ?</p>
		<p><strong>NB 1:</strong> Если в «тёмной комнате» история набирает минус 3 голоса, то для посетителей она исчезает из виду и остаётся видной только администраторам. Администратор может на своё усмотрение либо удалить историю окончательно, либо, если он найдёт её несправедливо заминусованной, одобрить историю с минусовым рейтингом.</p>
		<p><strong>NB 2:</strong> Перед тем, как удалить историю с сайта, следует удалить привязанную к ней тему на форуме, если её успели создать.</p>
		<p>1) Истории-дубли (т. е. уже размещённые на сайте) обязательно должны быть удалены. В случае сомнений, была ли уже история на сайте, воспользуйтесь поиском.</p>
		<p>2) Вопиюще безграмотные истории, которые сложно редактировать, должны быть удалены. Сюда же относятся длинные тексты с разорванными строками, на приведение которых в подобающий вид требуется много сил и времени.</p>
		<p>3) Повести/романы чрезмерно большого объема не следует пропускать в основную ленту — <strong>Kriper.Ru</strong> не является электронной библиотекой. Очень редко может быть сделано исключение для действительно стоящих вещей (например, ранее на сайте был опубликован целый роман «Зов»).</p>
		<p>4) <strong>Kriper.Ru</strong> — не личная библиотека одного автора или интернет-ресурса. Если кто-то присылает подряд сразу несколько историй одного автора или тексты со ссылкой на один и тот же сайт, следует одобрить 1-2 лучшие истории, а остальные удалить.</p>
		<p>5) Нежелательно в ленте делать сильный уклон на один жанр, подряд публикуя большое количество схожих между собой историй (про призраков, страшилки про одну и ту же местность, истории из разряда «жесть», художественные рассказы) и т. д. Следует сохранять стилистическое разнообразие текстов, перемежая жанры в ленте.</p>
		<p>6) Также по вышеуказанной причине нежелательно забить ленту очень длинными историями — нужно перемежать их короткими, чтобы не утомить читателей.</p>
		<p>7) Одобрение историй с элементами порнографии и текстов, содержащих сцены откровенной жестокости, делается на страх и риск администратора, который принимает решение.</p>
		<p>8) Любая одобренная история должна иметь хоть какое-то отношение к хоррору («страшным историям»). Банальной криминальной хронике, слезливым историям из жизни, фантастике, фэнтези и т. д. не место на сайте.</p>
		<p>9) Следует с осторожностью относиться к историям, изобилующими матами и грубым сленгом. Если в истории нет чего-то выдающегося, её можно удалить, а не мучиться с редактированием. В отдельных случаях, если мат и сленг являются органичными частями истории, можно одобрить текст в исходном виде с меткой «без редактирования».</p>
		<p>10) Естественно, не должны быть пропущены на главную страницу банальные и примитивные «детские страшилки», сочиненные на коленке.</p>
		<p>11) Есть нюанс с историями, написанными в юмористическом ключе. Их следует пропускать в основную ленту лишь в качестве исключения, не очень часто. Если главные герои истории испытали настоящий страх (пусть потом и выяснилось, что это недоразумение), то тексту можно приписать метку «ложная тревога».</p>
		<p>12) Любые рекламные ссылки в историях недопустимы.</p>
		<p>13) Рейтинг истории в «тёмной комнате» — это конечно, показатель, но не железобетонный. Если администратор сочтёт, что имела место накрутка голосов либо массовое заблуждение, и история недостойна попасть на главную страницу, то он вправе её удалить.</p>
		<p style="font-size:16px;font-weight:bold;margin:10px 0;">КАКИЕ КАРТИНКИ НЕОБХОДИМО УДАЛЯТЬ?</p>
		<p>1) В библиотеку картинок следует по возможности отбирать более-менее профессиональные и нестандартные изображения. Дилетантщину и банальщину — примитивный «фотошоп», типичные кадры из фильмов ужасов, непрофессиональные рисунки от руки, одинаково «жуткие» куклы и т. д. — лучше не пропускать.</p>
		<p>2) Изображение не должно быть чрезмерно мерзким, тошнотворным — в нём должна быть эстетическая ценность.</p>
		<p>3) Слишком маленькие, нечёткие, диспропорциональные и т. д. картинки следует удалять.</p>
		<p>4) Изображения с крупными водяными знаками и навязчивыми логотипами сайтов лучше удалять.</p>
		<p style="font-size:16px;font-weight:bold;margin:10px 0;">МОДЕРАЦИЯ ФОРУМА</p>
		<p>1) Движок форума позволяет автоматически создавать привязанные к историям темы, но, к сожалению, не даёт возможность эти темы автоматически удалять при удалении истории или редактировать первое сообщение темы, когда текст истории меняется. Таким образом, как было упомянуто выше, перед удалением истории на сайте администратор должен сначала вручную удалить привязанную к ней тему на форуме.</p>
		<p>2) По той же причине текст истории в первом сообщении привязанной темы остаётся неизменным с момента создания темы, даже если после этого сама история была отредактирована. На этот случай на форуме над текстом истории помещен дисклеймер: «Здесь приведён текст истории на момент начала обсуждения, отредактированная версия на сайте может отличаться от него». На практике же раньше я всегда менял текст истории на форуме сразу после правки на сайте. Как поступать далее — решать новым администраторам.</p>
		<p>3) Сайт часто атакуют спам-боты. Их деятельность следует пресекать, удаляя оставленные ими сообщения и блокируя созданные ими аккаунты.</p>
		<p>4) Если обсуждение истории в привязанной теме скатилось в затяжной оффтоп и флейм, то можно перенести «флудовую» часть сообщений в раздел «Запредельное». Для этого нужно создать одноимённую тему в разделе «Запредельное» и перенести туда выбранные сообщения, используя возможности модератора. В исходной теме администратор должен оставить сообщение со ссылкой на новую тему, а в новой теме — сообщение со ссылкой на исходную.</p>
		<p>5) Банить посетителей следует только при крайней необходимости, если они неоднократно оставляют сообщения, содержащие прямые оскорбления и/или сетевой вандализм. Помните, что мат разрешён правилами форума, и за ненормативную лексику у нас не блокируют, если только она не используется для открытого оскорбления других посетителей.</p>
		<p>Если на сайте заявится сверхактивный вандал, которого не унять штатными средствами форума, или возникнет серьёзная проблема (техническая или иного рода), пишите мне на форуме личное сообщение. Я обязательно приму меры.</p>
		<p>Удачи! :)</p>
		<p>С уважением, <strong>FRIDAY13</strong>.</p>
	{/container}
	
{/extend}