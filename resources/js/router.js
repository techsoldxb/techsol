import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)

import firstpage from './components/pages/myfirstvuepage'
import newRoutePage from './components/pages/newRoutePage'
import thirdpage from './components/pages/thirdpage'
import jobenquiry from './components/job/jobenquiry'

const routes = [

    {
        path: '/accounts',
        component: firstpage
    },
    
    {
        path: '/new-route',
        component: newRoutePage
    },
    
    {
        path: '/third',
        component: thirdpage
    },
    
    {
        path: '/jobenq',
        component: jobenquiry
    }
]

export default new Router({
    mode: 'history',
    routes
})