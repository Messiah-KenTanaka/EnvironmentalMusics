<template>
    <div class="folium-map z_index_1" id="map"></div>
</template>

<script>
import "leaflet/dist/leaflet.css";
import L from "leaflet";
import icon from "leaflet/dist/images/marker-icon.png";
import iconRetina from "leaflet/dist/images/marker-icon-2x.png";
import iconShadow from "leaflet/dist/images/marker-shadow.png";

export default {
mounted() {
    var map = L.map("map").setView([35.65809922, 139.74135747], 5);
    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        'Map data &copy; <a href="https://openstreetmap.org">OpenStreetMap</a>',
    maxZoom: 18
    }).addTo(map);

    let DefaultIcon = L.icon({
    iconUrl: icon,
    iconRetinaUrl: iconRetina,
    shadowUrl: iconShadow,
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    tooltipAnchor: [16, -28],
    shadowSize: [41, 41]
    });
    L.Marker.prototype.options.icon = DefaultIcon;

    // 北海道
    var nanporoshinsuikōen = L.marker([43.07017,141.60152]).addTo(map)
        nanporoshinsuikōen.bindPopup("<b>南幌親水公園</b>").openPopup()

    var yoichidamu = L.marker([43.15474,140.68368]).addTo(map)
        yoichidamu.bindPopup("<b>余市ダム</b>").openPopup()

    var onumakoen_hokkaido = L.marker([41.9843,140.6792]).addTo(map)
        onumakoen_hokkaido.bindPopup("<b>大沼公園(北海道)</b>").openPopup()

    // 青森県
    var odanainuma = L.marker([40.73912,141.36801]).addTo(map)
        odanainuma.bindPopup("<b>小田内沼</b>").openPopup()

    var gokawameembankment = L.marker([40.7132,141.3922]).addTo(map)
        gokawameembankment.bindPopup("<b>五川目堤</b>").openPopup()

    var tsugarufujimiko = L.marker([40.7507,140.3859]).addTo(map)
        tsugarufujimiko.bindPopup("<b>津軽富士見湖</b>").openPopup()

    var iizumedam = L.marker([40.84201,140.51639]).addTo(map)
        iizumedam.bindPopup("<b>飯詰ダム</b>").openPopup()

    var nogiwako = L.marker([40.84936,140.67581]).addTo(map)
        nogiwako.bindPopup("<b>野木和湖</b>").openPopup()

    var namiokadamu = L.marker([40.71942,140.67519]).addTo(map)
        namiokadamu.bindPopup("<b>浪岡ダム</b>").openPopup()

    var hayakakenumakoen = L.marker([41.31497,141.22318]).addTo(map)
        hayakakenumakoen.bindPopup("<b>早掛沼公園</b>").openPopup()

    var hanakirekawa = L.marker([40.74011,141.27329]).addTo(map)
        hanakirekawa.bindPopup("<b>花切川</b>").openPopup()
    
    // 岩手県
    var kitakamigawa = L.marker([39.3102,141.1524]).addTo(map)
        kitakamigawa.bindPopup("<b>北上川</b>").openPopup()

    var tsunatoridamu = L.marker([39.71092,141.20470]).addTo(map)
        tsunatoridamu.bindPopup("<b>綱取ダム</b>").openPopup()

    var goseko = L.marker([39.6760,140.9983]).addTo(map)
        goseko.bindPopup("<b>御所湖</b>").openPopup()

    var shijushidadamu = L.marker([39.75273,141.14889]).addTo(map)
        shijushidadamu.bindPopup("<b>四十四田ダム</b>").openPopup()

    var junisonuma = L.marker([39.36181,141.13345]).addTo(map)
        junisonuma.bindPopup("<b>十二丁目沼</b>").openPopup()

    var mizusawadaimyojin = L.marker([39.10290,141.19183]).addTo(map)
        mizusawadaimyojin.bindPopup("<b>水沢大明神</b>").openPopup()

    var taseko = L.marker([39.3198,141.3194]).addTo(map)
        taseko.bindPopup("<b>田瀬湖</b>").openPopup()

    var aobako = L.marker([40.37431,141.48180]).addTo(map)
        aobako.bindPopup("<b>青葉湖</b>").openPopup()

    // 宮城県
    var abukumagawa = L.marker([37.90095,140.66029]).addTo(map)
        abukumagawa.bindPopup("<b>阿武隈川</b>").openPopup()

    var tsukiyamaike = L.marker([38.26186,140.75100]).addTo(map)
        tsukiyamaike.bindPopup("<b>月山池</b>").openPopup()

    var naganumadamu = L.marker([38.70828,141.14976]).addTo(map)
        naganumadamu.bindPopup("<b>長沼ダム</b>").openPopup()

    var tarumizudamu = L.marker([38.17856,140.84237]).addTo(map)
        tarumizudamu.bindPopup("<b>樽水ダム</b>").openPopup()

    var tarumizudamu = L.marker([38.43435,140.82129]).addTo(map)
        tarumizudamu.bindPopup("<b>南川ダム</b>").openPopup()

    var kasenuma = L.marker([38.31324,140.99085]).addTo(map)
        kasenuma.bindPopup("<b>加瀬沼</b>").openPopup()

    var agawanuma = L.marker([38.29043,141.05688]).addTo(map)
        agawanuma.bindPopup("<b>阿川沼</b>").openPopup()

    // 秋田県
    var asanainuma = L.marker([40.1490,140.0080]).addTo(map)
        asanainuma.bindPopup("<b>浅内沼</b>").openPopup()

    var tenjinnuma = L.marker([39.22363,139.91974]).addTo(map)
        tenjinnuma.bindPopup("<b>天神沼</b>").openPopup()

    var takubonuma = L.marker([39.29102,140.54818]).addTo(map)
        takubonuma.bindPopup("<b>田久保沼</b>").openPopup()

    var hachirogata = L.marker([39.9265,139.9838]).addTo(map)
        hachirogata.bindPopup("<b>八郎潟</b>").openPopup()

    var koizumikata = L.marker([39.81892,140.06441]).addTo(map)
        koizumikata.bindPopup("<b>小泉潟</b>").openPopup()

    var naganuma = L.marker([39.82581,140.04739]).addTo(map)
        naganuma.bindPopup("<b>長沼</b>").openPopup()

    var babamegawa = L.marker([39.91490,140.15956]).addTo(map)
        babamegawa.bindPopup("<b>馬場目川</b>").openPopup()

    var kakusukenuma = L.marker([40.09211,140.06963]).addTo(map)
        kakusukenuma.bindPopup("<b>角助沼</b>").openPopup()

    // 山形県
    var mogamigawa = L.marker([38.34479,140.27000]).addTo(map)
        mogamigawa.bindPopup("<b>最上川</b>").openPopup()

    var maekawwadamu = L.marker([38.12444,140.23283]).addTo(map)
        maekawwadamu.bindPopup("<b>前川ダム</b>").openPopup()

    var tomeyamagawadamu = L.marker([38.35269,140.45812]).addTo(map)
        tomeyamagawadamu.bindPopup("<b>留山川ダム</b>").openPopup()

    var kenminnomori = L.marker([38.23556,140.20843]).addTo(map)
        kenminnomori.bindPopup("<b>県民の森</b>").openPopup()

    var sanhonkinuma = L.marker([38.19491,140.35180]).addTo(map)
        sanhonkinuma.bindPopup("<b>三本木沼</b>").openPopup()

    var ebitsurunuma = L.marker([38.43802,140.33932]).addTo(map)
        ebitsurunuma.bindPopup("<b>海老鶴沼</b>").openPopup()

    var ikoinomori = L.marker([38.38849,140.22399]).addTo(map)
        ikoinomori.bindPopup("<b>いこいの森</b>").openPopup()

    var numanobechi = L.marker([38.26154,140.36446]).addTo(map)
        numanobechi.bindPopup("<b>沼の辺池</b>").openPopup()

    // 福島県
    var eharako = L.marker([37.5610,140.1040]).addTo(map)
        eharako.bindPopup("<b>桧原湖</b>").openPopup()

    var manodamu = L.marker([37.71873,140.83324]).addTo(map)
        manodamu.bindPopup("<b>真野ダム</b>").openPopup()

    var inawashiroko = L.marker([37.4734,140.0870]).addTo(map)
        inawashiroko.bindPopup("<b>猪苗代湖</b>").openPopup()

    var miharudamu = L.marker([37.40398,140.47532]).addTo(map)
        miharudamu.bindPopup("<b>三春ダム</b>").openPopup()

    var jurokunumakoen = L.marker([37.81490,140.41593]).addTo(map)
        jurokunumakoen.bindPopup("<b>十六沼公園</b>").openPopup()

    var kominejou = L.marker([37.13393,140.21453]).addTo(map)
        kominejou.bindPopup("<b>小峰城</b>").openPopup()

    var kamadogawa = L.marker([36.95028,140.85146]).addTo(map)
        kamadogawa.bindPopup("<b>釜戸川</b>").openPopup()

    // 茨城県
    var kasumigaura = L.marker([36.0392,140.4032]).addTo(map)
        kasumigaura.bindPopup("<b>霞ヶ浦</b>").openPopup()

    var tonegawa = L.marker([35.9041,140.5243]).addTo(map)
        tonegawa.bindPopup("<b>利根川</b>").openPopup()

    var kitaura = L.marker([36.0104,140.5701]).addTo(map)
        kitaura.bindPopup("<b>北浦</b>").openPopup()

    var sotonasakaura = L.marker([35.90685,140.59425]).addTo(map)
        sotonasakaura.bindPopup("<b>外浪逆浦</b>").openPopup()

    var mitominamifisshingueria = L.marker([36.32264,140.48824]).addTo(map)
        mitominamifisshingueria.bindPopup("<b>水戸南フィッシングエリア</b>").openPopup()

    var ushikunuma = L.marker([35.94751,140.12871]).addTo(map)
        ushikunuma.bindPopup("<b>牛久沼</b>").openPopup()

    var huzimiike = L.marker([35.99859,140.56290]).addTo(map)
        huzimiike.bindPopup("<b>富士見池</b>").openPopup()

    // 栃木県
    var kokaigawa = L.marker([36.24880,139.99831]).addTo(map)
        kokaigawa.bindPopup("<b>小貝川</b>").openPopup()

    var kidogawa = L.marker([36.36323,139.91135]).addTo(map)
        kidogawa.bindPopup("<b>鬼怒川</b>").openPopup()

    var shigawa = L.marker([36.51481,139.67526]).addTo(map)
        shigawa.bindPopup("<b>思川</b>").openPopup()

    var nakagawa = L.marker([36.77473,140.13602]).addTo(map)
        nakagawa.bindPopup("<b>那珂川</b>").openPopup()

    var akagawadamu = L.marker([36.61997,139.79046]).addTo(map)
        akagawadamu.bindPopup("<b>赤川ダム</b>").openPopup()

    var gogyougawa = L.marker([36.67169,139.97809]).addTo(map)
        gogyougawa.bindPopup("<b>五行川</b>").openPopup()

    var watarasegawa = L.marker([36.3029,139.5045]).addTo(map)
        watarasegawa.bindPopup("<b>渡良瀬川</b>").openPopup()

    var onumakoen_tochigi = L.marker([36.35242,139.83257]).addTo(map)
        onumakoen_tochigi.bindPopup("<b>大沼公園(栃木県)</b>").openPopup()

    var kingufissha = L.marker([36.91265,140.07239]).addTo(map)
        kingufissha.bindPopup("<b>キングフィッシャー</b>").openPopup()

    // 群馬県
    var yoshiinoike = L.marker([36.26273,139.03918]).addTo(map)
        yoshiinoike.bindPopup("<b>吉井野池</b>").openPopup()

    var takenumachosuichi = L.marker([36.23614,139.02250]).addTo(map)
        takenumachosuichi.bindPopup("<b>竹沼貯水池</b>").openPopup()

    var harunako = L.marker([36.4752,138.8670]).addTo(map)
        harunako.bindPopup("<b>榛名湖</b>").openPopup()

    var higashitanisabodamu = L.marker([36.21401,138.95659]).addTo(map)
        higashitanisabodamu.bindPopup("<b>東谷砂防ダム</b>").openPopup()

    var tataranuma = L.marker([36.2577,139.4951]).addTo(map)
        tataranuma.bindPopup("<b>多々良沼</b>").openPopup()

    var kondounuma = L.marker([36.2263,139.5000]).addTo(map)
        kondounuma.bindPopup("<b>近藤沼</b>").openPopup()

    // 埼玉県
    var shibayamanuma = L.marker([36.03583,139.62107]).addTo(map)
        shibayamanuma.bindPopup("<b>柴山沼</b>").openPopup()

    var nakagawa = L.marker([35.84058,139.84393]).addTo(map)
        nakagawa.bindPopup("<b>中川</b>").openPopup()

    var okutamako = L.marker([35.7774,139.0114]).addTo(map)
        okutamako.bindPopup("<b>奥多摩湖</b>").openPopup()

    var benkeibori = L.marker([35.67882,139.73499]).addTo(map)
        benkeibori.bindPopup("<b>弁慶堀</b>").openPopup()

    var ongatakokusaitsuriborijo = L.marker([35.68349,139.27306]).addTo(map)
        ongatakokusaitsuriborijo.bindPopup("<b>恩方国際釣堀場</b>").openPopup()

    // 神奈川県
    var sagamiko = L.marker([35.61119,139.18609]).addTo(map)
        sagamiko.bindPopup("<b>相模湖</b>").openPopup()

    var thikuiko = L.marker([35.5907,139.2611]).addTo(map)
        thikuiko.bindPopup("<b>津久井湖</b>").openPopup()

    var sagamigawa = L.marker([35.54269,139.32748]).addTo(map)
        sagamigawa.bindPopup("<b>相模川</b>").openPopup()

    var ebinaundokoenura = L.marker([35.43143,139.37654]).addTo(map)
        ebinaundokoenura.bindPopup("<b>海老名運動公園裏</b>").openPopup()

    var tamagawa = L.marker([35.6233,139.5721]).addTo(map)
        tamagawa.bindPopup("<b>多摩川</b>").openPopup()

    var asinoko = L.marker([35.2151,139.0021]).addTo(map)
        asinoko.bindPopup("<b>芦ノ湖</b>").openPopup()

    var tanzawako = L.marker([35.4195,139.0421]).addTo(map)
        tanzawako.bindPopup("<b>丹沢湖</b>").openPopup()

    var shinseiko = L.marker([35.36023,139.21053]).addTo(map)
        shinseiko.bindPopup("<b>震生湖</b>").openPopup()

    var thurumigawa = L.marker([35.51082,139.55363]).addTo(map)
        thurumigawa.bindPopup("<b>鶴見川</b>").openPopup()

    var nakathugawa = L.marker([35.46239,139.36483]).addTo(map)
        nakathugawa.bindPopup("<b>中津川</b>").openPopup()

    // 新潟県
    var fukushimagatahosuiro = L.marker([37.91450,139.23846]).addTo(map)
        fukushimagatahosuiro.bindPopup("<b>福島潟放水路</b>").openPopup()

    var fukushimagatahosuiro = L.marker([37.88762,139.24506]).addTo(map)
        fukushimagatahosuiro.bindPopup("<b>大通川</b>").openPopup()

    var shinanogawa = L.marker([37.46242,138.83881]).addTo(map)
        shinanogawa.bindPopup("<b>信濃川</b>").openPopup()

    var uthinokuradamu = L.marker([37.85035,139.42468]).addTo(map)
        uthinokuradamu.bindPopup("<b>内の倉ダム</b>").openPopup()

    var igarashigawa = L.marker([37.54564,139.08121]).addTo(map)
        igarashigawa.bindPopup("<b>五十嵐川</b>").openPopup()

    var aganogawa = L.marker([37.74376,139.31857]).addTo(map)
        aganogawa.bindPopup("<b>阿賀野川</b>").openPopup()

    var nakanokutigawa = L.marker([37.84379,139.01487]).addTo(map)
        nakanokutigawa.bindPopup("<b>中之口川</b>").openPopup()

    var kiyogata = L.marker([37.99753,139.29025]).addTo(map)
        kiyogata.bindPopup("<b>清潟</b>").openPopup()

    // 富山県
    var goidamu = L.marker([36.75298,136.88149]).addTo(map)
        goidamu.bindPopup("<b>五位ダム</b>").openPopup()

    var kodouike = L.marker([36.6549,137.1022]).addTo(map)
        kodouike.bindPopup("<b>古洞池</b>").openPopup()

    var sakuragaike = L.marker([36.49742,136.86809]).addTo(map)
        sakuragaike.bindPopup("<b>桜ヶ池</b>").openPopup()

    var yakushojiike = L.marker([36.70095,137.08651]).addTo(map)
        yakushojiike.bindPopup("<b>薬勝寺池</b>").openPopup()

    var fuchufurusatoshizenkoen = L.marker([36.65888,137.11589]).addTo(map)
        fuchufurusatoshizenkoen.bindPopup("<b>婦中ふるさと自然公園</b>").openPopup()

    var konadegawadamu = L.marker([36.72606,136.85293]).addTo(map)
        konadegawadamu.bindPopup("<b>子撫川ダム</b>").openPopup()

    var wadagawadamu = L.marker([36.65481,137.03943]).addTo(map)
        wadagawadamu.bindPopup("<b>和田川ダム</b>").openPopup()

    var koyabegawa = L.marker([36.61348,136.90443]).addTo(map)
        koyabegawa.bindPopup("<b>小矢部川</b>").openPopup()

    // 石川県
    var kahokugata = L.marker([36.65234,136.66348]).addTo(map)
        kahokugata.bindPopup("<b>河北潟</b>").openPopup()

    var tanedamu = L.marker([36.98399,136.96408]).addTo(map)
        tanedamu.bindPopup("<b>多根ダム</b>").openPopup()

    var asanogawa = L.marker([36.61266,136.64589]).addTo(map)
        asanogawa.bindPopup("<b>浅野川</b>").openPopup()

    var higashikushikawa = L.marker([36.35775,136.39397]).addTo(map)
        higashikushikawa.bindPopup("<b>東串川</b>").openPopup()

    var nishikusigawa = L.marker([36.37129,136.41322]).addTo(map)
        nishikusigawa.bindPopup("<b>西串川</b>").openPopup()

    var oomiyagawa = L.marker([36.62692,136.65041]).addTo(map)
        oomiyagawa.bindPopup("<b>大宮川</b>").openPopup()

    var kibagata = L.marker([36.36714,136.44508]).addTo(map)
        kibagata.bindPopup("<b>木場潟</b>").openPopup()

    var shinoharaike = L.marker([36.35938,136.34669]).addTo(map)
        shinoharaike.bindPopup("<b>篠原池</b>").openPopup()

    var kaganoike = L.marker([36.29629,136.28866]).addTo(map)
        kaganoike.bindPopup("<b>加賀野池</b>").openPopup()

    // 福井県
    var takedagawa = L.marker([36.17445,136.28838]).addTo(map)
        takedagawa.bindPopup("<b>竹田川</b>").openPopup()

    var hinogawa = L.marker([35.21501,133.38805]).addTo(map)
        hinogawa.bindPopup("<b>日野川</b>").openPopup()

    var ryugahanadamu = L.marker([36.15216,136.34645]).addTo(map)
        ryugahanadamu.bindPopup("<b>龍ヶ鼻ダム</b>").openPopup()

    var fukuikitaintayokoike = L.marker([36.07925,136.28055]).addTo(map)
        fukuikitaintayokoike.bindPopup("<b>福井北インター横池</b>").openPopup()

    var echizenmachiyachi = L.marker([35.95589,136.03943]).addTo(map)
        echizenmachiyachi.bindPopup("<b>越前町野池</b>").openPopup()

    // 山梨県
    var kawaguthiko = L.marker([35.5167,138.7499]).addTo(map)
        kawaguthiko.bindPopup("<b>河口湖</b>").openPopup()

    var yamanakako = L.marker([35.4187,138.8754]).addTo(map)
        yamanakako.bindPopup("<b>山中湖</b>").openPopup()

    var saiko = L.marker([35.50155,138.68561]).addTo(map)
        saiko.bindPopup("<b>西湖</b>").openPopup()

    var shouzinko = L.marker([35.4887,138.6106]).addTo(map)
        shouzinko.bindPopup("<b>精進湖</b>").openPopup()

    var motosuko = L.marker([35.4643,138.5857]).addTo(map)
        motosuko.bindPopup("<b>本栖湖</b>").openPopup()

    var thiyodako = L.marker([35.7025,138.5539]).addTo(map)
        thiyodako.bindPopup("<b>千代田湖</b>").openPopup()

    var tanukiko_yamanashi = L.marker([35.3446,138.5609]).addTo(map)
        tanukiko_yamanashi.bindPopup("<b>田貫湖(山梨県)</b>").openPopup()

    var nagasakaushiike = L.marker([35.83125,138.37448]).addTo(map)
        nagasakaushiike.bindPopup("<b>長坂牛池</b>").openPopup()

    var oshinofisshingueria = L.marker([35.46103,138.85049]).addTo(map)
        oshinofisshingueria.bindPopup("<b>忍野フィッシングエリア</b>").openPopup()

    // 長野県
    var nojiriko_nagano = L.marker([36.82845,138.23045]).addTo(map)
        nojiriko_nagano.bindPopup("<b>野尻湖(長野県)</b>").openPopup()

    var chikumagawa = L.marker([36.35967,138.32009]).addTo(map)
        chikumagawa.bindPopup("<b>千曲川</b>").openPopup()

    var aokiko = L.marker([36.60880,137.84822]).addTo(map)
        aokiko.bindPopup("<b>青木湖</b>").openPopup()

    var kisakiko = L.marker([36.5555,137.8378]).addTo(map)
        kisakiko.bindPopup("<b>木崎湖</b>").openPopup()

    var shirakabako = L.marker([36.49485,138.01582]).addTo(map)
        shirakabako.bindPopup("<b>白樺湖</b>").openPopup()

    var takoike = L.marker([36.70206,138.23690]).addTo(map)
        takoike.bindPopup("<b>田子池</b>").openPopup()

    var sessoko = L.marker([36.31170,138.52113]).addTo(map)
        sessoko.bindPopup("<b>雪窓湖</b>").openPopup()

    var tamizoike = L.marker([36.32742,137.66108]).addTo(map)
        tamizoike.bindPopup("<b>田溝池</b>").openPopup()

    var ooguteko = L.marker([35.39480,137.76166]).addTo(map)
        ooguteko.bindPopup("<b>おおぐて湖</b>").openPopup()

    // 岐阜県
    var ooegawa = L.marker([35.2017,136.6488]).addTo(map)
        ooegawa.bindPopup("<b>大江川</b>").openPopup()

    var gosangawa = L.marker([35.24664,136.60106]).addTo(map)
        gosangawa.bindPopup("<b>五三川</b>").openPopup()

    var yahagidamu = L.marker([35.23663,137.41963]).addTo(map)
        yahagidamu.bindPopup("<b>矢作ダム</b>").openPopup()

    var nagaragawa = L.marker([35.4551,136.8338]).addTo(map)
        nagaragawa.bindPopup("<b>長良川</b>").openPopup()

    var akigamidamu = L.marker([36.0658,137.3991]).addTo(map)
        akigamidamu.bindPopup("<b>秋神ダム</b>").openPopup()

    var kisogawa = L.marker([35.4734,137.2121]).addTo(map)
        kisogawa.bindPopup("<b>木曽川</b>").openPopup()

    var kamiyaike = L.marker([35.49436,137.46623]).addTo(map)
        kamiyaike.bindPopup("<b>神谷池</b>").openPopup()

    var mithuyaike = L.marker([35.45304,136.94210]).addTo(map)
        mithuyaike.bindPopup("<b>三ツ池</b>").openPopup()

    var hyoutanko = L.marker([35.49326,137.46356]).addTo(map)
        hyoutanko.bindPopup("<b>ひょうたん湖</b>").openPopup()

    // 静岡県
    var tanukiko_shizuoka = L.marker([35.34492,138.56126]).addTo(map)
        tanukiko_shizuoka.bindPopup("<b>田貫湖(静岡県)</b>").openPopup()

    var ippekiko = L.marker([34.9295,139.1059]).addTo(map)
        ippekiko.bindPopup("<b>一碧湖</b>").openPopup()

    var numatu_kadoike = L.marker([35.1290,138.8812]).addTo(map)
        numatu_kadoike.bindPopup("<b>沼津・門池</b>").openPopup()

    var inasako = L.marker([34.8859,137.7140]).addTo(map)
        inasako.bindPopup("<b>いなさ湖/都田川ダム</b>").openPopup()

    var kakegawa = L.marker([34.78526,138.01915]).addTo(map)
        kakegawa.bindPopup("<b>掛川・菊川野池群</b>").openPopup()

    var hamakitanoike = L.marker([34.84059,137.78033]).addTo(map)
        hamakitanoike.bindPopup("<b>浜北野池</b>").openPopup()

    // 愛知県
    var thitanoikegun = L.marker([34.84905,136.89077]).addTo(map)
        thitanoikegun.bindPopup("<b>知多野池群</b>").openPopup()

    var irukaike = L.marker([35.3450,136.9998]).addTo(map)
        irukaike.bindPopup("<b>入鹿池</b>").openPopup()

    var yasakugawa = L.marker([35.04987,137.18213]).addTo(map)
        yasakugawa.bindPopup("<b>矢作川</b>").openPopup()

    var okuyahagiko = L.marker([35.2280,137.4352]).addTo(map)
        okuyahagiko.bindPopup("<b>奥矢作湖</b>").openPopup()

    var mikawako = L.marker([35.0282,137.4085]).addTo(map)
        mikawako.bindPopup("<b>三河湖</b>").openPopup()

    var aburagahuthi = L.marker([34.9009,137.0146]).addTo(map)
        aburagahuthi.bindPopup("<b>油ヶ淵</b>").openPopup()

    var shonaigawa = L.marker([35.2166,136.9672]).addTo(map)
        shonaigawa.bindPopup("<b>庄内川</b>").openPopup()

    var yakanike = L.marker([35.04418,136.90598]).addTo(map)
        yakanike.bindPopup("<b>ヤカン池</b>").openPopup()

    var tenryugawa = L.marker([34.88408,137.80458]).addTo(map)
        tenryugawa.bindPopup("<b>天竜川</b>").openPopup()

    // 三重県
    var kimiganodamu = L.marker([34.59713,136.31380]).addTo(map)
        kimiganodamu.bindPopup("<b>君ケ野ダム</b>").openPopup()

    var shourenziko = L.marker([34.6001,136.1194]).addTo(map)
        shourenziko.bindPopup("<b>青蓮寺湖</b>").openPopup()

    var nanairodamu = L.marker([33.9616,136.0031]).addTo(map)
        nanairodamu.bindPopup("<b>七色ダム</b>").openPopup()

    var komoridamu = L.marker([33.93474,135.92786]).addTo(map)
        komoridamu.bindPopup("<b>小森ダム</b>").openPopup()

    var kawagoeyosui = L.marker([35.02323,136.68366]).addTo(map)
        kawagoeyosui.bindPopup("<b>川越用水</b>").openPopup()

    var hokuseichuokoen = L.marker([35.0673,136.5458]).addTo(map)
        hokuseichuokoen.bindPopup("<b>北勢中央公園</b>").openPopup()

    // 滋賀県
    var biwako = L.marker([35.2882,136.0966]).addTo(map)
        biwako.bindPopup("<b>琵琶湖</b>").openPopup()

    var sonenuma = L.marker([35.24105,136.19423]).addTo(map)
        sonenuma.bindPopup("<b>曽根沼</b>").openPopup()

    var nodanuma = L.marker([35.45046,136.19750]).addTo(map)
        nodanuma.bindPopup("<b>野田沼</b>").openPopup()

    // 京都府
    var ujigawa = L.marker([34.92022,135.75225]).addTo(map)
        ujigawa.bindPopup("<b>宇治川</b>").openPopup()

    var hiyoshidamu = L.marker([35.14774,135.51777]).addTo(map)
        hiyoshidamu.bindPopup("<b>日吉ダム</b>").openPopup()

    var kathuragawa = L.marker([34.99149,135.70939]).addTo(map)
        kathuragawa.bindPopup("<b>桂川</b>").openPopup()

    var oonodamu = L.marker([35.26233,135.46021]).addTo(map)
        oonodamu.bindPopup("<b>大野ダム</b>").openPopup()

    var kidzugawa = L.marker([34.83270,135.76489]).addTo(map)
        kidzugawa.bindPopup("<b>木津川</b>").openPopup()

    var nakayamaike = L.marker([35.00585,135.56621]).addTo(map)
        nakayamaike.bindPopup("<b>中山池</b>").openPopup()

    var yuragawa = L.marker([35.26987,135.46639]).addTo(map)
        yuragawa.bindPopup("<b>由良川</b>").openPopup()

    var daishouike = L.marker([34.81242,135.85437]).addTo(map)
        daishouike.bindPopup("<b>大正池</b>").openPopup()

    var arashiyamafisshingueria = L.marker([35.04339,135.67333]).addTo(map)
        arashiyamafisshingueria.bindPopup("<b>嵐山フィッシングエリア</b>").openPopup()

    // 大阪府
    var yodogawa = L.marker([34.7331,135.5326]).addTo(map)
        yodogawa.bindPopup("<b>淀川</b>").openPopup()

    var kanzakigawa = L.marker([34.75722,135.54874]).addTo(map)
        kanzakigawa.bindPopup("<b>神崎川</b>").openPopup()

    var horikawadamu = L.marker([34.32333,135.30997]).addTo(map)
        horikawadamu.bindPopup("<b>堀河ダム</b>").openPopup()

    var yamatogawa = L.marker([34.60094,135.70285]).addTo(map)
        yamatogawa.bindPopup("<b>大和川</b>").openPopup()

    var neyagawa = L.marker([34.72201,135.62808]).addTo(map)
        neyagawa.bindPopup("<b>寝屋川</b>").openPopup()

    var aikawa = L.marker([34.7648,135.5413]).addTo(map)
        aikawa.bindPopup("<b>安威川</b>").openPopup()

    var hattoriryokuchi = L.marker([34.7753,135.4866]).addTo(map)
        hattoriryokuchi.bindPopup("<b>服部緑地</b>").openPopup()

    var suisofisshingusenta = L.marker([34.42048,135.36259]).addTo(map)
        suisofisshingusenta.bindPopup("<b>水藻フィッシングセンター</b>").openPopup()

    // 兵庫県
    var chikusagawa = L.marker([35.00167,134.40617]).addTo(map)
        chikusagawa.bindPopup("<b>千種川</b>").openPopup()

    var kakogawa = L.marker([34.7987,134.9076]).addTo(map)
        kakogawa.bindPopup("<b>加古川</b>").openPopup()

    var azumaharinoike = L.marker([34.81701,134.83132]).addTo(map)
        azumaharinoike.bindPopup("<b>東播野池</b>").openPopup()

    var kanayamako = L.marker([35.1897,134.8355]).addTo(map)
        kanayamako.bindPopup("<b>銀山湖</b>").openPopup()

    var hitokuradamu = L.marker([34.90517,135.41195]).addTo(map)
        hitokuradamu.bindPopup("<b>一庫ダム</b>").openPopup()

    var aaonodamu = L.marker([34.9357,135.2102]).addTo(map)
        aaonodamu.bindPopup("<b>青野ダム</b>").openPopup()

    var toujouko = L.marker([34.9299,135.0688]).addTo(map)
        toujouko.bindPopup("<b>東条湖</b>").openPopup()

    // 奈良県
    var ikeharadamu = L.marker([34.04709,135.97186]).addTo(map)
        ikeharadamu.bindPopup("<b>池原ダム</b>").openPopup()

    var thuburoko = L.marker([34.4019,135.9037]).addTo(map)
        thuburoko.bindPopup("<b>津風呂湖</b>").openPopup()

    var kazeyadamu = L.marker([34.04442,135.78807]).addTo(map)
        kazeyadamu.bindPopup("<b>風屋ダム</b>").openPopup()

    var nunomedamu = L.marker([34.70023,135.97823]).addTo(map)
        nunomedamu.bindPopup("<b>布目ダム</b>").openPopup()

    var takayamadamu = L.marker([34.75338,136.01114]).addTo(map)
        takayamadamu.bindPopup("<b>高山ダム</b>").openPopup()

    var kurahashitameike = L.marker([34.49816,135.86948]).addTo(map)
        kurahashitameike.bindPopup("<b>倉橋ため池</b>").openPopup()

    var tomiogawa = L.marker([34.67713,135.74123]).addTo(map)
        tomiogawa.bindPopup("<b>富雄川</b>").openPopup()

    var kurahashitameike = L.marker([34.49888,135.87078]).addTo(map)
        kurahashitameike.bindPopup("<b>倉橋ため池</b>").openPopup()
        
    var osakodamu = L.marker([34.27381,136.01374]).addTo(map)
        osakodamu.bindPopup("<b>大迫ダム</b>").openPopup()

    // 和歌山県
    var gougawadamu = L.marker([33.68321,135.56467]).addTo(map)
        gougawadamu.bindPopup("<b>合川ダム</b>").openPopup()

    var kinokawa = L.marker([34.25555,135.38414]).addTo(map)
        kinokawa.bindPopup("<b>紀ノ川</b>").openPopup()

    var shitukawadamu = L.marker([33.59194,135.68884]).addTo(map)
        shitukawadamu.bindPopup("<b>七川ダム</b>").openPopup()

    var chinzandamu = L.marker([33.96017,135.39113]).addTo(map)
        chinzandamu.bindPopup("<b>椿山ダム</b>").openPopup()

    var aritagawa = L.marker([34.03778,135.31026]).addTo(map)
        aritagawa.bindPopup("<b>有田川</b>").openPopup()

    var sakuraike = L.marker([34.29327,135.38591]).addTo(map)
        sakuraike.bindPopup("<b>桜池</b>").openPopup()

    // 鳥取県
    var tanegaike = L.marker([35.53517,134.23717]).addTo(map)
        tanegaike.bindPopup("<b>多鯰ケ池</b>").openPopup()

    var fusesogoundokoen = L.marker([35.49983,134.17829]).addTo(map)
        fusesogoundokoen.bindPopup("<b>布勢総合運動公園</b>").openPopup()

    var koyamaike = L.marker([35.50826,134.15007]).addTo(map)
        koyamaike.bindPopup("<b>湖山池</b>").openPopup()

    var hashidzugawa = L.marker([35.49805,133.88075]).addTo(map)
        hashidzugawa.bindPopup("<b>橋津川</b>").openPopup()

    var tougouike = L.marker([35.47816,133.89242]).addTo(map)
        tougouike.bindPopup("<b>東郷池</b>").openPopup()

    var tenjingawa = L.marker([35.41977,133.85127]).addTo(map)
        tenjingawa.bindPopup("<b>天神川</b>").openPopup()

    var nishitakaodamu = L.marker([35.44004,133.70120]).addTo(map)
        nishitakaodamu.bindPopup("<b>西高尾ダム</b>").openPopup()

    var yubarako = L.marker([35.22447,133.71306]).addTo(map)
        yubarako.bindPopup("<b>湯原湖</b>").openPopup()

    var nishitakaodamu = L.marker([35.43941,133.70101]).addTo(map)
        nishitakaodamu.bindPopup("<b>西高尾ダム</b>").openPopup()

    var yubarako = L.marker([35.2274,133.7106]).addTo(map)
        yubarako.bindPopup("<b>湯原湖</b>").openPopup()

    var ryokusuiko = L.marker([35.3026,133.3268]).addTo(map)
        ryokusuiko.bindPopup("<b>緑水湖（賀祥ダム）</b>").openPopup()

    var nichinanko = L.marker([35.21704,133.32257]).addTo(map)
        nichinanko.bindPopup("<b>日南湖（菅沢ダム）</b>").openPopup()

    // 島根県
    var nakaumi = L.marker([35.4772,133.1763]).addTo(map)
        nakaumi.bindPopup("<b>中海</b>").openPopup()

    var asakumigawa = L.marker([35.4907,133.0767]).addTo(map)
        asakumigawa.bindPopup("<b>朝酌川</b>").openPopup()

    var shinjiko = L.marker([35.4453,132.9658]).addTo(map)
        shinjiko.bindPopup("<b>宍道湖</b>").openPopup()

    var yuyagawa = L.marker([35.43430,132.82303]).addTo(map)
        yuyagawa.bindPopup("<b>湯谷川</b>").openPopup()

    var jaike = L.marker([35.30137,132.65522]).addTo(map)
        jaike.bindPopup("<b>蛇池</b>").openPopup()

    var sanbedamu = L.marker([35.17195,132.55994]).addTo(map)
        sanbedamu.bindPopup("<b>三瓶ダム</b>").openPopup()

    var enokawa = L.marker([34.76647,132.48680]).addTo(map)
        enokawa.bindPopup("<b>江の川</b>").openPopup()

    var onbedamu = L.marker([34.72236,132.03225]).addTo(map)
        onbedamu.bindPopup("<b>御部ダム</b>").openPopup()

    var banryuko = L.marker([34.6811,131.8055]).addTo(map)
        banryuko.bindPopup("<b>蟠竜湖</b>").openPopup()

    // 岡山県
}
};
</script>

<style>
#map {
    position: relative;
    width: 100%;
    height: 600px;
    left: 0%;
    top: 0%;
}
</style>
