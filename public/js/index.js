var app = new Vue({
    el: '#root',
    data: {
        userInfoKeys: [
            {key: "username", name: "姓名"},
            {key: "userno", name: "学号"},
            {key: "gender", name: "性别"},
            {key: "userid", name: "NetId"},
            {key: "mobile", name: "手机号码"},
            {key: "idcardname", name: "证件类型"},
            {key: "idcardno", name: "证件号码"},
            {key: "email", name: "E-mail"},
            {key: "birthday", name: "生日"},
            {key: "dep", name: "学院名称"},
            {key: "speciality", name: "专业名称"},
            {key: "classid", name: "班级名称"},
            {key: "roomnumber", name: "宿舍地址"},
            {key: "depid", name: "学院id"},
            {key: "nation", name: "民族"},
            {key: "nationplace", name: "籍贯"},
            {key: "polity", name: "政治面貌"},
            {key: "roomphone", name: "宿舍电话"},
            {key: "studenttype", name: "考生类型"},
            {key: "tutoremployeeid", name: "导师姓名"},
            {key: "marriage", name: "婚姻状态"},
            {key: "usertype", name: "身份"}
        ],
        actions: [
            {value: 'stu_id', text: '学工号'},
            {value: 'net_id', text: 'NetID'},
            {value: 'name', text: '姓名'},
            {value: 'mobile', text: '手机号'}
        ],
        action: 'stu_id',
        value: '',
        userInfo: []
    },
    computed: {
        actionText: function () {
            var _this = this;
            return this.actions.find(function (item) {
                return item.value === _this.action;
            }).text
        }
    },
    methods: {
        getUserInfo: function () {
            var _this = this;
            axios.get('api.php', {
                params: {
                    action: this.action,
                    value: this.value
                }
            })
            .then(function (response) {
                if (response.data) {
                    if (Array.isArray(response.data)) {
                        _this.userInfo = response.data;
                    } else {
                        _this.userInfo = [response.data];
                    }
                } else {
                    _this.userInfo = [];
                }
            });
        }
    }
});
