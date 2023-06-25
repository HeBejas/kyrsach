<div class="content">
    <div class="content__info">
        <div class="content__info__space main_block_2">
            <div class="content__info-block">
                <div class="content__info-p-img">
                    <p>Индивидуальность</p>
                </div class="main-text">
                Вы можете заказать<br> индивидуальную, 
                созданную специально для вас модель.<br> При заказе мастер <br>учтет все ваши пожелания
            </div>
            <style>
            </style>
            <div class="content__info__space_between">
            </div>

            <div class="content__info-block">
                <div class="content__info-p-img">
                    <p>Мастерство</p>
                </div>
                Мастера в ателье – опытные профессионалы с высокой квалификацией. 
                Мы располагаем современным оборудованием качественными материалами
            </div>
        </div>
        <div class="content__info__space">
            <div class="content__info-block main_block_1">
                <div class="content__info-p-img">
                    <p>Ателье "Старая Липа"</p>
                </div>
                Ателье по ремонту и пошиву <br>одежды.
                В услуги нашего ателье входит реставрация, перекрой,<br> ремонт, а так же
                создание новой одежды по вашему заказу</div>
        </div>
        <div class="content__info__space main_block_3">
            <div class="content__info-block">
                <div class="content__info-p-img">
                    <p>Доступность</p>
                </div>
                <br>
                Мы предлагаем все виды услуг недорого, чтобы каждый мог <br>позволить 
                себе получить <br>качественное изделие <br>по доступной цене.
            </div> 
        </div>
    </div>
    <div class="content__work">
        <div class="content__work-block-mainramka"></div>
        <div class="content__work-block__ramka">
            <div class="content__work-block-ramka">
                <p class="content__work-block-p">Ремонт</p>
            </div>
        </div>
        <div class="content__work-block">
            <img src="img/1.png">
            <div class="content__work-block__text">
                Когда любимая блузка порвалась или протерлась, а на новом платье сломалась молния, выбрасывать такие вещи совершенно не хочется. В таком случае поможет срочный ремонт одежды. Можно попытаться починить одежду самостоятельно, но далеко не каждая сможет вернуть вещи совершенно новый вид.Чтобы сделать ремонт одежды качественно, особенно если повреждение на видном месте, требуются мастерство и опыт. Поэтому за срочным ремонтом одежды в Ижевске обращайтесь в ателье «Старая Липа».
                <br><br>
                Обращаясь в ателье, вы доверяете свою одежду рукам профессионалов. В ателье вы найдете не только опытных специалистов по ремонту и пошиву одежды, но и специальное оборудование, материалы и фурнитуру для быстрого и качественного устранения любых проблем с одеждой. 
            </div>
        </div>
    </div>
    <div class="content__work">
        <div class="content__work-block-mainramka"></div>
        <div class="content__work-block__ramka">
            <div class="content__work-block-ramka">
            <p class="content__work-block-p">Пошив</p>
            </div>
        </div>
        
        <div class="content__work-block">
            <div class="content__work-block__text">
                Одежда, которую можно купить в магазинах, однотипна и хорошо сидит далеко не на каждом. Учесть все особенности и все типы фигуры при серийном производстве просто невозможно, поэтому магазинная одежда ориентируется на усредненные типы и габариты. Если вы хотите получить красивую и уникальную одежду, созданную специально для вас, вам поможет пошив одежды на заказ в ателье. Она подчеркнет вашу индивидуальность и поможет вам заявить о себе.
                <br><br>
                Фабричное качество!<br>
                Профессиональный крой!
            </div>
            <img src="img/2.png">
        </div>
    </div>
    <div class="content__persons">

        <div class="content__persons-sign">
            <p class="block-title">Наши Сотрудники</p>
            <div class="block-title-border"></div>
        </div>
        <div class="content__boxes">
            <div class="content__work-block-mainramka" style="height:100%"></div>
            
            <div class="slider slider-main">
                <div class="slide">
                    <p class="content__box-ramka-p3">Портной</p>
                    <img data-lazy="img/chel1.png">
                    <p class="content__box-ramka-p2">Сергей Александрович <br> Наумов</p>
                </div>
                <div class="slide">
                    <p class="content__box-ramka-p3">Портной</p>
                    <img data-lazy="img/chel3.png">
                    <p class="content__box-ramka-p2">Семен Алексеевич <br> Портфельев</p>
                </div>
                <div class="slide">
                    <p class="content__box-ramka-p3">Портной</p>
                    <img data-lazy="img/chel2.png">
                    <p class="content__box-ramka-p2">Ольга Николавевна <br> Русских</p>
                </div>
                <div class="slide">
                    <p class="content__box-ramka-p3">Портной</p>
                    <img data-lazy="img/chel1.png">
                    <p class="content__box-ramka-p2">Сергей Александрович <br> Наумов</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$( document ).ready(function() {
    // let omlet = document.getElementById("per_rig_arr");
    // console.log( omlet );
    var slider = $('.slider-main').slick({
        lazyLoad: 'ondemand',
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
    });
    slider.slick('reinit');    

});
</script>

<!--     <div class="wrap">
        <div class="block-chain">
        </div>
    </div>
 -->