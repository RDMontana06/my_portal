let args = {
    wz_nav_style: "dots",
    navigation: "all",
    wz_ori: "horizontal",
};

const wizard = new Wizard(args);

wizard.init();

// document.addEventListener("submitWizard", function (e) {
//     let empCode = document.querySelector(".employee_code").value;
//     console.log(empCode);
// });

// document.addEventListener("endWizard", function (e) {
// 	alert("WIZARD END");
// });
