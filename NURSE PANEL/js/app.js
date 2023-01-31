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
            
            // add my account - header
            sotarget.classList.add('so_active')
            nurse_account_section.classList.remove('active')

            // add nurse dynamic
            add_nurse_section.classList.remove('active')
            nurse_landing.classList.remove('active')
            nurse_info_section.classList.remove('active')
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

    // nurse account show
    const account_btn = document.querySelector('#account_btn')
    const nurse_account_section = document.querySelector('.nurse_account_section')
    account_btn.addEventListener('click', () => {
      nurse_account_section.classList.add('active')
      add_nurse_section.classList.remove('active')
      nurse_info_section.classList.remove('active')
      so_content.forEach(tabContent => {
        tabContent.classList.remove('so_active')

    })
    })
    // otp modal
  const l_form = document.querySelectorAll('.l_form')  
  const confirmation_modal = document.querySelector('.confirmation_modal')  
    l_form.forEach(i => {
      i.addEventListener('submit', (e) => {
        e.preventDefault();
        confirmation_modal.classList.add('active')
      })
  })
  confirmation_modal.addEventListener('click', (e) => {
    if(e.target.classList.contains('confirmation_modal')){
      confirmation_modal.classList.remove('active')
    }
  })

    // add nurse section show
    const nurse_landing = document.querySelector('.nurse_landing')
    const add_nurse_section = document.querySelector('.add_nurse_section')
    const custom_btn = document.querySelector('.custom_btn')

    custom_btn.addEventListener('click', () => {
      add_nurse_section.classList.add('active')
      nurse_landing.classList.add('active')
    })

    // nurse info show
    const nurse_info_section = document.querySelector('.nurse_info_section')
    const card = document.querySelectorAll('.card')
    card.forEach(i => {
      i.addEventListener('click', () => {
        nurse_info_section.classList.add('active')
        nurse_landing.classList.add('active')
      })
    })

  // nurse tab
  const tabs = document.querySelectorAll('[data-target]')
  tabs.forEach(i => {
    i.addEventListener('click', (e) => {
        // tabs.forEach(tab => {
        //   tab.classList.remove('active')
        // })
        if(e.target.classList.contains('active')){
          i.classList.remove('active')
        }else{
          i.classList.add('active')
        }
    })
  })



  // nurse remove button modal

  const remove = document.querySelector('.remove')
  const delete_nurse_modal = document.querySelector('.delete_nurse_modal')
  remove.addEventListener('click', () => {
    delete_nurse_modal.classList.add('active')
  }) 

  delete_nurse_modal.addEventListener('click', (e) => {
    e.stopPropagation()
    if(e.target.classList.contains('delete_nurse_modal')){
      delete_nurse_modal.classList.remove('active')
    }
  })

