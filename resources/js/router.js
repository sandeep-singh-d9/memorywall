import Vue from 'vue';
import VueRouter from 'vue-router';

import demoCanvasComponent from "./components/ExampleComponent";
import EditorComponent from "./components/EditorComponent";
import homeComponent from "./components/homeComponent";
import demoComponent from "./components/demoComponent";
import testCanvas from "./components/testCanvas";
import wrapped from "./components/wrapEditorComponent";
import guilDemo from "./components/guilDemo";
import cartComponent from "./components/cartComponent";
import checkoutComponent from "./components/common/checkoutComponent";
import loginComponent from "./components/users/loginComponent";
import registerComponent from "./components/users/registerComponent";
import giftOption from "./components/common/giftOption";
import thankyou from "./components/common/thankyou";
import dashboard from "./components/myAccount/dashboardComponent";
import myAccount from "./components/myAccount/myAccountComponent";
import addressBook from "./components/myAccount/addressBookComponent";
import myInformation from "./components/myAccount/myInformationComponent";
import myOrder from "./components/myAccount/myOrderComponent";
import viewOrder from "./components/myAccount/viewOrderComponent";
import aboutUs from "./components/common/aboutUs";
import contactUs from "./components/common/contactUs";
import giftCanvasComponent from "./components/giftCanvasComponent";
import loader from "./components/loader/loader";



Vue.use(VueRouter)

export default new VueRouter({
    routes: [
        {
            path: '/welcome',
            component: demoCanvasComponent,
        },
        {
            path: '/loader',
            component: loader,
        },
        {
            path: '/dev-ui',
            component: EditorComponent,
        },
        {
            path: '/',
            component: homeComponent,
        },
        {
            path: '/demo',
            component: demoComponent,
        },
        {
            path: '/test',
            component: testCanvas,
        },
        {
            path: '/wrapped',
            component: wrapped,
        },
        {
            path: '/cart',
            component: cartComponent,
        },
        {
            path: '/signIn',
            component: loginComponent,
        },
        {
            path: '/signup',
            component: registerComponent,
        },
        {
            path: '/checkout',
            component: checkoutComponent,
        },
        {
            path: '/giftOption',
            component: giftOption,
        },
        {
            name: 'thankyou',
            path: '/thankyou',
            component: thankyou,
        },
        {
            name: 'giftcanvas',
            path: '/giftcanvas',
            component: giftCanvasComponent,
        },
        // {
        //     path: '/dashboard',
        //     component: dashboard,
        // },
        {
            path: '/my-account',
            component: myAccount,
            children: [{
                name: 'dashboard',
                path: 'dashboard',
                component: dashboard
            },
            {
                name: 'myOrder',
                path: 'myOrder',
                component: myOrder
            },
            {
                name: 'myInformation',
                path: 'myInformation',
                component: myInformation
            },
            {
                name: 'addressBook',
                path: 'addressBook',
                component: addressBook
            },
            {
                name: 'viewOrder',
                path: '/my-account/viewOrder/:id',
                component: viewOrder
            }
            ]
        },
        {
            name: 'aboutUs',
            path: '/aboutUs',
            component: aboutUs,
        },
        {
            name: 'contactUs',
            path: '/contactUs',
            component: contactUs,
        },

    ],
    mode: 'history',
})