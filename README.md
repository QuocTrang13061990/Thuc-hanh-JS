# Thuc hanh JS
Học theo: Lab1 Bai1 WEB2061 - Lập trình Javascrift nâng cao - SP21

# Learn JS 
    - website: https://www.javascripttutorial.net
        + Validate form: 
            + https://www.javascripttutorial.net/javascript-dom/javascript-form-validation/#:~:text=What%20is%20form%20validation,is%20called%20client%2Dside%20validation.
        + Regex thì xem tại: https://www.javascripttutorial.net/javascript-regular-expression/


# Note
    0. Vấn đề chưa hiểu
        - Trong hàm checkUsername = dù có khai báo kiểu var usernameVl (value của username), nhưng khi click btn thì vẫn không lấy được usernameVl, lúc này phải đi lấy lại value của username.
    1. Các cách viết function trong javascript
        - function isRequired(){}
        - const isRequired = function(){}
        - ES6: 
            - const isRequired = param => logic
            - const isRequired = (param) => logic 
            - const isRequired = param => {logic}  
            - EX: 
                - const isRequired = value => value === '' ? false : true;
                - const isRequired = (value) => value === '' ? false : true;
                - const isRequired = value => { return value === '' ? false : true;}
    2. remove, add Class ()
        - Example
            - formField.classList.remove('success');
            - formField.classList.add('error');
    3. Viết biến trong chuỗi
        - showError(usernameEl, `Username must be between ${min} and ${max} characters.`)
    4. CSS
        - Hiển thị border error của thẻ input (form-field nào có class = "error" thì thiết lập border cho thẻ input)
            - .form-field.error input {border-color: var(--error-color);
                                                }
    5. AJAX
        - Khi chuyển data sang server.php thì tại đây, muốn gọi hàm nào đó viết tại đây thì gọi ở phía sau hàm (hàm đặt ở trước)