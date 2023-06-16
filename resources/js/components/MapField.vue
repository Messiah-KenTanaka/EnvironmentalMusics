<template>
    <div class="folium-map" id="map"></div>
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
