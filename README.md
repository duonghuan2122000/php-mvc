 
# PHP MVC
**PHP MVC** là một framework PHP được viết theo mô hình MVC ( Model - View - Controller )

## Mục lục

 * [Yêu cầu](#yeu-cau)
 * [Cài đặt](#cai-dat)
 * [Tài liệu](#tai-lieu)
	 - [Routing](#routing)
	 - Đang cập nhật...

## Yêu cầu
PHP MVC yêu cầu phiên bản PHP 5.6+
## Cài đặt

    git clone https://github.com/duonghuan2122000/php-mvc.git
## Tài liệu
### Routing
Mọi route trong PHP MVC đều được định nghĩa trong file `~/app/routes.php`. Khi mới bắt đầu, bạn sẽ thấy trong file:

    $router->get('/', 'HomeController@index');
---
Trong PHP MVC hỗ trợ hai phương thức `GET` và `POST`

    // Phương thức GET
    $router->get($url, $action);
	
	// Phương thức POST
	$router->post($url, $action);
Trong đó: 
 - `$url`: URL
 - `$action`: hành động khi route được gọi. Có thể là một callback (một
   hàm) hoặc một phương thức trong controller.

---
Đang cập nhật...

	

