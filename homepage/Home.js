document.addEventListener('DOMContentLoaded',
function(){
    let cookiesBanner=document.querySelector('.cookies-banner')
    let cookiesBannerCloseButton=document.querySelector('.cookies-banner-button .button')
   let cookiesBannerDelay=2000
    if(cookiesBanner) {
setTimeout(showBanner,cookiesBannerDelay)
}
if(cookiesBannerCloseButton){
    cookiesBannerCloseButton.addEventListener('click',cookiesBannerCloseButtonClicked)
}
function cookiesBannerCloseButtonClicked(e)
{
    e.preventDefault()
    hideBanner()
}
function showBanner()
{
    cookiesBanner.classList.add('show')
}
function hideBanner(){
     cookiesBanner.classList.remove('show')
}
})
