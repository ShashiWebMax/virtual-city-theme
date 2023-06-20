console.log("Hi Nittambuwa");


//delay function
function delay(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

//look for #the_sidebar if it exists and screen size is less than md append it to the mobile menu

const the_sidebar = document.querySelector('#the_sidebar');
if (the_sidebar && window.innerWidth < 768) {
    console.log({the_sidebar});
    //clone the sidebar
    const the_sidebar_clone = the_sidebar.cloneNode(true);
    the_sidebar_clone.classList.remove('hidden');
    the_sidebar_clone.classList.remove('md:block');
    the_sidebar_clone.classList.add('md:hidden');
    the_sidebar_clone.classList.add('rounded-md');
    the_sidebar_clone.classList.add('mt-2');
    the_sidebar_clone.classList.add('block');
    const mobile_menu = document.querySelector('#mobile-menu');
    mobile_menu.appendChild(the_sidebar_clone);

}
    