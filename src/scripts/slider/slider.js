import Glide from '@glidejs/glide';
window.onload = function(e){
    slider("sliders", "testimonial__container", 'prevBtn', 'nextBtn');
    let carouselBlog = document.querySelector('.glide');
	if (carouselBlog) {
		let glide = new Glide('.glide', {
			type: 'carousel',
			perView: 5,
            startAt: 2,
			
            breakpoints: {
				1230: {
					perView: 3,
					autoplay: 4000,
					
				},
				702: {
					perView: 2,
					autoplay: 4000,
				},
				500: {
					perView: 1,
					autoplay: 3000,
				}

			}
		});

		glide.mount();
	}

	function slider(id, slideClass, btnPrev, btnNext){
			const sliderService = document.getElementById(id);
			const slidesService = sliderService.getElementsByClassName(slideClass);
		let currentSlide = 0;
		let nextSlide = 1;
	  if(sliderService){
		  slidesService[currentSlide].style.display = "block";
	  }
	  
		function autoSlide() {
		
		slidesService[currentSlide].style.display = "none";
	  
		currentSlide = (currentSlide + 1) % slidesService.length;
		nextSlide = (nextSlide + 1) % slidesService.length;
	  
		slidesService[currentSlide].style.display = "block";
		}
	  
		setInterval(autoSlide, 3000);
	  
		const prevBtn = document.getElementById(btnPrev);
		const nextBtn = document.getElementById(btnNext);
		prevBtn.addEventListener("click", function() {
		  slidesService[currentSlide].style.display = "none";
	  
		  currentSlide = (currentSlide - 1 + slidesService.length) % slidesService.length;
	  
		  slidesService[currentSlide].style.display = "block";
		});
		nextBtn.addEventListener("click", function() {
		  slidesService[currentSlide].style.display = "none";
	  
		  currentSlide = (currentSlide + 1) % slidesService.length;
	  
		  slidesService[currentSlide].style.display = "block";
	  });
	  }
	     const tabs = document.querySelectorAll(".sana__nav button");
		const contents = document.querySelectorAll(".sana__main-content section");
		if(tabs){
			tabs.forEach((tab, index) => {
				tab.addEventListener("click", () => {
					tabs.forEach((t) => t.classList.remove("active"));
					contents.forEach((c) => c.classList.remove("active"));
					tab.classList.add("active");
					contents[index].classList.add("active");
				});
			});
	    }
		//  window pop up
		const boton = document.getElementById("btn-pop-up");
		const ventana = document.getElementById("window");
		const cerrar = document.getElementById("cerrar-ventana");
		if(boton){
			boton.addEventListener("click", function() {
				ventana.style.display = "block";
			  });
			  cerrar.addEventListener("click", function() {
				ventana.style.display = "none";
			  });
		}
		const programBnt = document.querySelectorAll('.package-one__btns--program');
		const tab2 = document.getElementById('tab2');
        const viewport = document.getElementById("content2");
		if(programBnt){
			programBnt.forEach(element => {
				element.addEventListener('click', () => { 
				tab2.click() 
				viewport.scrollIntoView();
				// setTimeout(function () {
					
				// }, 100)
			    
			});
			});
		}
}

