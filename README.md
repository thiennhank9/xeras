# Xeras

Trường ĐH Công nghệ thông tin - ĐHQG TPHCM.
Lớp: KTPM2014
Năm 2018-2019
GVHD: ThS. Huỳnh Tuấn Anh và ThS. Phạm Thi Vương
SV thực hiện:
1. Nguyễn Thiện Nhân 14520626
2. Trần Minh Công 14520100

## Coral Talk

### Cài đặt 

* Cài đặt và chạy docker 

* Chạy mongodb trên docker hoặc local, để đơn giản mình chỉ hướng dẫn chạy mongodb trên docker 

```bash
    docker run -p 127.0.0.1:27017:27017 -d mongo
```

* Chạy redis trên docker

```bash
    docker run -p 127.0.0.1:6379:6379 -d redis
```

* Tạo file cấu hình các biến môi trường, trong thư mục talk tạo file `.env` với nội dung như sau:

```
    NODE_ENV=production
    TALK_MONGO_URL=mongodb://127.0.0.1:27017/talk
    TALK_REDIS_URL=redis://127.0.0.1:6379
    TALK_ROOT_URL=http://127.0.0.1:3000
    TALK_PORT=3000
    TALK_JWT_SECRET=HK3W+^L2JY
    TALK_JWT_ISSUER=http://127.0.0.1:3000/
    TALK_JWT_AUDIENCE=talk

    # Login with facebook account
    TALK_FACEBOOK_APP_ID=463189277523881
    TALK_FACEBOOK_APP_SECRET=89842dbbeec064c064c78cc312decf61

    # NLP Server
    NLP_URL_SERVER=http://127.0.0.1:3000/
```

* Cài đặt thư viện

```shell
    npm install
```

* Nén file react fontend với webpack

```shell
    npm run build
```

* Chạy ứng dụng

```shell
    npm run watch:server
```

* Đăng ký sử dụng talk lần đầu

Truy cập [http://127.0.0.1:3000/admin/install](http://127.0.0.1:3000/admin/install) và làm theo hướng dẫn

* Cấp quyển truy cập cho domain

Sau khi đăng ký truy cập [http://127.0.0.1:3000/admin/configure/tech](http://127.0.0.1:3000/admin/configure/tech) đăng nhập vào hệ thống, sau đó tại mục `Permitted Domains` (mục đầu tiên) điền tên domain `http://127.0.0.1:3000` vào. Sau đó chọn nút `Save Changes` bên trái.

* Lấy token xác thực cho bot

Gửi một Post request bằng Postman có các thuộc tính như sau

```shell
    url: http://127.0.0.1:3000/api/v1/auth/local
    type: POST
    headers: {
        'Content-Type': 'application/json'
    }
    body: {
        "email": "your email",
	    "password": "your password"
    }
```

Token được trả ở phía dưới cùng của dữ liệu trả về.

* Gắn token xác thực cho bot

Trong file `bots_indentify.js (/xeras/congtran/talk/services/auto_reply_comment/bots_identifi.js)` sửa thuộc tính `bot_jwt_token` thành token vừa lấy được ở trên

### Kiểm thử auto reply bot

Truy cập [http://127.0.0.1:3000/dev](http://127.0.0.1:3000/dev) comment với nội dung bất kỳ bot sẽ tự động phản hồi lại tức thì.

### Kiểm thử api trả lời tự động comment

* Tắt tính năng tự động trả lời comment tức thì

Trong file `comments (/xeras/congtran/talk/services/comments.js)` comment dòng 84 -> 87 (trước có dòng comment `// send reply comment`)

* Sử dụng api reply comment

yêu cầu: cần có `id`, `asset_id` của comment sẽ reply (chú ý lấy thông tin ở terminal khi comment sẽ tự động log ra id và asset_id của comment đó)

```shell
    url: http://127.0.0.1:3000/api/v1/bot/reply
    type: POST
    headers: {
        'Content-Type': 'application/json'
    }
    body: {
        "id": "comment_id you want to reply",
        "asset_id": "assert_id which have the comment you want reply",
        "content": "reply content to comment you want reply"
    }
```