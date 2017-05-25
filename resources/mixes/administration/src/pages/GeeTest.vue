<script>
    import injection from '../helpers/injection';

    export default {
        beforeRouteEnter(to, from, next) {
            injection.loading.start();
            injection.http.post(`${window.api}/geetest/get`).then(response => {
                const data = response.data.data;
                next(vm => {
                    vm.form.enabled = data.enabled === '1';
                    vm.form.appid = data.appid;
                    vm.form.appkey = data.appkey;
                    injection.loading.finish();
                    injection.sidebar.active('setting');
                });
            });
        },
        data() {
            return {
                form: {
                    enabled: true,
                    appid: '',
                    appkey: '',
                },
                loading: false,
                rules: {
                    appid: [
                        {
                            required: true,
                            type: 'string',
                            message: injection.trans('notadd-geetest.setting.opinions.id.error'),
                            trigger: 'change',
                        },
                    ],
                    appkey: [
                        {
                            required: true,
                            type: 'string',
                            message: injection.trans('notadd-geetest.setting.opinions.key.error'),
                            trigger: 'change',
                        },
                    ],
                },
                trans: injection.trans,
            };
        },
        methods: {
            submit() {
                const self = this;
                self.loading = true;
                self.$refs.form.validate(valid => {
                    if (valid) {
                        self.$http.post(`${window.api}/geetest/set`, self.form).then(() => {
                            self.$notice.open({
                                title: injection.trans('notadd-geetest.setting.success'),
                            });
                        }).finally(() => {
                            self.loading = false;
                        });
                    } else {
                        self.loading = false;
                        self.$notice.error({
                            title: injection.trans('notadd-geetest.setting.fail'),
                        });
                    }
                });
            },
        },
    };
</script>
<template>
    <card>
        <p slot="title">{{ trans('notadd-geetest.setting.title') }}</p>
        <i-form :label-width="200" :model="form" ref="form" :rules="rules">
            <row>
                <i-col span="12">
                    <form-item :label="trans('notadd-geetest.setting.opinions.open.label')">
                        <i-switch v-model="form.enabled" size="large">
                            <span slot="open">{{ trans('notadd-geetest.setting.opinions.open.open') }}</span>
                            <span slot="close">{{ trans('notadd-geetest.setting.opinions.open.close') }}</span>
                        </i-switch>
                    </form-item>
                </i-col>
            </row>
            <row>
                <i-col span="12">
                    <form-item :label="trans('notadd-geetest.setting.opinions.id.label')" prop="id">
                        <i-input :placeholder="trans('notadd-geetest.setting.opinions.id.placeholder')" v-model="form.appid"></i-input>
                    </form-item>
                </i-col>
            </row>
          <row>
            <i-col span="12">
              <form-item :label="trans('notadd-geetest.setting.opinions.key.label')" prop="token">
                <i-input :placeholder="trans('notadd-geetest.setting.opinions.key.placeholder')" v-model="form.appkey"></i-input>
              </form-item>
            </i-col>
          </row>
            <row>
                <i-col span="12">
                    <form-item>
                        <i-button :loading="loading" type="primary" @click.native="submit">
                            <span v-if="!loading">{{ trans('notadd-geetest.setting.submit') }}</span>
                            <span v-else>{{ trans('notadd-geetest.setting.loading') }}</span>
                        </i-button>
                    </form-item>
                </i-col>
            </row>
        </i-form>
    </card>
</template>
