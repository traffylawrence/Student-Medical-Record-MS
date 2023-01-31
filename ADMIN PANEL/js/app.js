const toggle = document.querySelector('#sidebarCollapse')
    const sidebar = document.querySelector('#sidebar')
    toggle.addEventListener('click' , () => {
      toggle.classList.toggle('active')
      sidebar.classList.toggle('active')
    })

    const so_tabs = document.querySelectorAll('[data-tab-target]');
    const so_content = document.querySelectorAll('[data-tab-content]');
    so_tabs.forEach(so => {
    
        so.addEventListener('click', () => {
            const sotarget = document.querySelector(so.dataset.tabTarget)
            so_content.forEach(tabContent => {
                tabContent.classList.remove('so_active')
              
            })
            so_tabs.forEach(tab => {
                tab.classList.remove('so_active')
            })
            so.classList.add('so_active')
            sotarget.classList.add('so_active')
        })
    })

    var w = window.innerWidth;
    var h = window.innerHeight;

    if(w >= '788'){
      toggle.classList.remove('active')
      sidebar.classList.remove('active')
    }

    window.addEventListener('resize', () => {
    if(window.innerWidth > 788){
        if(sidebar.classList.contains('active')){
          toggle.classList.remove('active')
          sidebar.classList.remove('active')
        }
      }
    if(window.innerWidth < 788){
          toggle.classList.add('active')
          sidebar.classList.add('active')  
      }
    })