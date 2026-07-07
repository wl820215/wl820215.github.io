window.jx1="https://www.playm3u8.cn/jiexi.php?url=";
window.jx2="https://jx.xmflv.com/?url=";
window.isMobileDevice=function() {
                const userAgent = navigator.userAgent || navigator.vendor || window.opera;
                const platform = navigator.platform;

                return (/Mobi|Android/i.test(userAgent) || ['iPhone', 'iPad', 'iPod', 'Android'].includes(platform));
}
//===============鏍稿績鍐呭闇€瑕佸姞瀵�==========================================================
if(!window.isMobileDevice()){

const head = document.head;
const body = document.body;


// 鍒涘缓 CSS 鏍峰紡
    const style = document.createElement('style');
    style.textContent = `
        * { box-sizing: border-box; }
        body { margin: 0; padding: 0; height: 100%; width: 100%; font-size: 1rem; font-weight: 400; line-height: 1.5; overflow: hidden; display: flex; flex-direction: column; }
        .jx_index { position: fixed;top: 0;left: 50%;transform: translateX(-50%);width: 1000px;max-width: 100%;height: 100vh;display: flex;flex-direction: column;}
        .jx_neirong { display: flex; justify-content: center; margin-bottom: 20px; margin-top: 20px; }
        .jx_neirong ul { padding-left: 0; display: flex; justify-content: center; margin: 0; }
        .jx_neirong ul li { list-style: none; margin: 5px; }
        .jx_neirong input[type=radio] { display: none; }
        .jx_neirong input[type=radio] + span { padding: 10px 15px; border: 2px solid #ddd; border-radius: 5px; cursor: pointer; }
        .jx_neirong input[type=radio]:checked + span { border-color: #3388ff; background-color: #3388ff; color: #fff; }
        .iframe-container { flex-grow: 1; width: 100%; background: black; color: #eee; }
        iframe { width: 100%; height: 100%; border: none; }
    `;
    document.head.appendChild(style);
//=============鍒涘缓google骞垮憡================================
    try {
    let googleScript = document.createElement("script");
    googleScript.setAttribute("async", "");
    googleScript.src = "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4955172504425974";
    googleScript.onerror = function () {};
    document.body.appendChild(googleScript);
} catch (error) {}
// 鍒涘缓宸︿晶骞垮憡
var leftAd = document.createElement('ins');
leftAd.className = 'adsbygoogle';
leftAd.style.cssText = 'display:inline-block;width:300px;height:600px;position:fixed;left:0;top:0;';
leftAd.setAttribute('data-ad-client', 'ca-pub-4955172504425974');
leftAd.setAttribute('data-ad-slot', '2108986807');
document.body.appendChild(leftAd);
(adsbygoogle = window.adsbygoogle || []).push({});

// 鍒涘缓鍙充晶骞垮憡
var rightAd = document.createElement('ins');
rightAd.className = 'adsbygoogle';
rightAd.style.cssText = 'display:inline-block;width:300px;height:600px;position:fixed;right:0;top:0;';
rightAd.setAttribute('data-ad-client', 'ca-pub-4955172504425974');
rightAd.setAttribute('data-ad-slot', '8453821730');
document.body.appendChild(rightAd);
(adsbygoogle = window.adsbygoogle || []).push({});
//==============鍒涘缓涓诲鍣�====================================
    const container = document.createElement('div');
    container.className = 'jx_index';
    container.innerHTML = `
        <div class="jx_neirong">
            <ul>
                <li><input type="radio" name="ss" id="url02" checked><span>閫氶亾1</span></li>
                <li><input type="radio" name="ss" id="url03"><span>閫氶亾2</span></li>
                <li><input type="radio" name="ss" id="url04"><span>閫氶亾3</span></li>
                <li><input type="radio" name="ss" id="url05"><span>閫氶亾4</span></li>
                <li><input type="radio" name="ss" id="url06"><span>閫氶亾5</span></li>
            </ul>
        </div>
        <div class="iframe-container">
            <iframe id="mmiframe" allowfullscreen="true" scrolling="no" sandbox="allow-top-navigation allow-same-origin allow-forms allow-scripts" src="about:blank"></iframe>
        </div>
    `;
    document.body.appendChild(container);

    function getQueryParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
    }

    function playVideo() {
        const videoUrl = getQueryParam("video");
        if (!videoUrl) {
            return;
        }

        const selectedChannel = document.querySelector('input[name="ss"]:checked').id;
        const parseApis = {
            "url02": window.jx1,
            "url03": window.jx2,
            "url04": window.jx3,
            "url05": window.jx4,
            "url06": window.jx5
        };
        if(parseApis[selectedChannel]){
            document.getElementById("mmiframe").src = parseApis[selectedChannel] + encodeURIComponent(videoUrl);
        }
        
    }

    document.querySelectorAll('.jx_neirong ul li span').forEach(span => {
        span.addEventListener('click', function () {
            const radio = this.previousElementSibling;
            if (radio) {
                radio.checked = true;
                radio.dispatchEvent(new Event("change"));
            }
        });
    });

    document.querySelectorAll('.jx_neirong input[type=radio]').forEach(radio => {
        radio.addEventListener('change', playVideo);
    });

    playVideo();
}
