import GeeTest from '../pages/GeeTest.vue';

export default function (injection) {
    injection.useExtensionRoute([
        {
            beforeEnter: injection.middleware.requireAuth,
            component: GeeTest,
            path: 'geetest',
        },
    ]);
}
