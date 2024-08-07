
//smooth scrolling for navigation links
document.addEventListener('DOMContentLoaded', function () {
    const navbarHeight = document.querySelector('nav').offsetHeight;

    document.querySelectorAll('nav a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                var offsetTop = targetElement.offsetTop - navbarHeight;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });


    //Function to trigger donwload when the button is clicked
    $('#Resumebtn').on('click', function () {
        var resumePath = 'MyResume.pdf';

        var downloadLink = document.createElement('a');
        downloadLink.href = resumePath;
        downloadLink.download = 'MyResume.pdf';
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    });

});