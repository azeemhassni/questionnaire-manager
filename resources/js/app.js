/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

if (document.getElementById('questionForm')) {
  const QuestionForm = new Vue({
    el: '#questionForm',
    data: {
      questions: [{
        type: 'Text',
        question: '',
        answer: '',
        choices: [{ // default 2 options
          choice: '',
          is_correct: false
        }, {
          choice: '',
          is_correct: false
        }]
      }]
    },
    methods: {
      addQuestion () {
        this.questions.push({
          type: 'Text',
          question: '',
          answer: '',
          choices: [{ // 2 choices by default
            choice: '',
            is_correct: false
          }, {
            choice: '',
            is_correct: false
          }]
        })
      },
      removeQuestion (index) {
        if (this.questions.length === 1) {
          alert('You need to have at least one question')
          return
        }
        this.questions.splice(index, 1)
      },
      addChoice (index) {
        this.questions[index].choices.push({
          choice: '',
          is_correct: false
        })
      },
      removeChoice (question, choice) {
        this.questions[question].choices.splice(choice, 1)
      }
    }
  })
}
