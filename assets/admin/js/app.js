require('../scss/material-dashboard.scss')
require('vue')

const App = {
    template: '#warehouse',
    delimiters: ['[[',']]'],
    data() {
      return { message: 'Hello' }
    }
  }

  
  new Vue({
    el: '#rubius',
    render: h => h(App)
  })