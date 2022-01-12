function popup()
{
    let unsuscribe = document.querySelector(".unsuscribe")
    let h = document.createElement("h3")
    h.textContent = "Do you really want to unsuscribe?"

    let div = document.createElement("div")

    let yes = document.createElement("a")
    yes.href = ""
    yes.classList.add("open")
    yes.textContent = "YES"

    let no = document.createElement("a")
    no.href = ""
    no.classList.add("remove")
    no.textContent = "NO"
    div.appendChild(yes)
    div.appendChild(no)

    let scripts = document.getElementsByTagName("script")
    let src = scripts[scripts.length-1].src;
    let yesPath = src.slice(0,-13)+"index.php?controler_file=unsuscribe"

    let sail = document.createElement("div")
    sail.classList.add("sail")

    let popup = document.createElement("div")
    popup.classList.add("popup")
    popup.appendChild(h)
    popup.appendChild(div)

    unsuscribe.addEventListener("click",(e)=>{
        e.preventDefault()
        document.body.appendChild(sail)
        document.body.appendChild(popup)
    })

    no.addEventListener("click",(e)=>{
        e.preventDefault()
        document.body.removeChild(sail)
        document.body.removeChild(popup)
    })

    yes.addEventListener("click",(e)=>{
        e.preventDefault()
        window.location.href = yesPath
    })
}   

for(let i = 0; i<3; i++)
{
    var strokes = document.getElementsByClassName("stroke")
    stroke = strokes[i]
    margTop = 8*(i+1) + 6*i
    stroke.style.marginTop = margTop + "px"
}

let nav = document.querySelector("a.nav")
nav.addEventListener("click",(e)=>{
    e.preventDefault();

    let deg
    let op
    let margTop
    let opa = 1
    if(strokes[1].style.opacity == "0")
    {
        opa = 0
    }
    for(let i = 0; i<3; i++)
    {
        stroke = strokes[i]

        op = i*(i-2)*opa+1
        deg = 45*(1-i)*opa
        margTop = 22*opa + (8*(i+1) + 6*i)*(1-opa)

        stroke.style.transform = "rotate(" + deg + "deg)"
        stroke.style.opacity = op
        stroke.style.marginTop = margTop + "px"
    }
    
    let headerLinks = document.querySelectorAll(".headerLinks *")
    headerLinks.forEach(function(headerLink){
        if(!headerLink.classList.contains("nav") && headerLink.tagName != "IMG")
        {
            if(headerLink.style.display == "none")
            {
                headerLink.style.display = "block"
            }
            else
            {
                headerLink.style.display = "none"
            }
        }
    })
})

var show = false;
var headerLinks = document.querySelectorAll(".headerLinks *")
if (window.matchMedia("(min-width: 801px)").matches)
{
    show = true;
    headerLinks.forEach(function(headerLink){
        if(!headerLink.classList.contains("nav") && headerLink.tagName != "IMG")
        {
            headerLink.style.display = "block"
        }
    })
}
if(window.matchMedia("(max-width: 800px)").matches)
{
    headerLinks.forEach(function(headerLink){
        if(!headerLink.classList.contains("nav") && headerLink.tagName != "IMG")
        {
            headerLink.style.display = "none"
            show = false
        }
    })
}

window.addEventListener("resize",()=>{
    var headerLinks = document.querySelectorAll(".headerLinks *")
    if (window.matchMedia("(min-width: 801px)").matches && show == false)
    {
        show = true;
        headerLinks.forEach(function(headerLink){
            if(!headerLink.classList.contains("nav") && headerLink.tagName != "IMG")
            {
                headerLink.style.display = "block"
            }
        })
    }
    if(window.matchMedia("(max-width: 800px)").matches && show == true)
    {
        headerLinks.forEach(function(headerLink){
            if(!headerLink.classList.contains("nav") && headerLink.tagName != "IMG")
            {
                headerLink.style.display = "none"
                show = false
            }
        })
    }
})

popup()