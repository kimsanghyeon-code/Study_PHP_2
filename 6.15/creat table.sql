CREATE TABLE member
--테이블을 만들겠다
(

id MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
--첫번째는 열이 id라는 이름이고
-- 중간정도사이즈 정수형자료를 저장할수있음
-- 부호가 없다 
-- 이 열(칼럼)은 절대 빈공백(널)이 들어올수없음
-- 하나의 데이터들이 추가될때마다 id값을 1씩 자동으로 증가한다
-- 자동증가 auto increment
-- 아이디넘버를 시스템이 자동으로 설정해준다
last_name  VARCHAR(50),
-- last_name은 50개의 글자가 들어올수있는데, 
-- 그글자의 길이는 유동적임 
-- 50이하로 해서 10자들어올지 5자가 들어올지는 모름
first_name VARCHAR(50),
-- 위와 같이 50개의 글자를 넣을 수 있는 first_name 열(칼럼)
age        TINYINT UNSIGNED,
-- 나이 타이니인티져데이터타입 정수형중에서 제일작은사이즈의 공간을 쓰겠다
PRIMARY KEY (id)
-- 기본키는 id칼럼으로 하겠다
-- 기본키는 현재 테이블에서 모든 데이터가 유일한 값
-- 주민등록번호, 학번, 생물학적으로는 지문, 손등의 정맥흐름 고유의 법칙에서 모든 데이터가 다르다
-- 고유한 값을 기본키 primary key라고 불러요
);

INSERT INTO member (last_name, first_name, age) VALUES ('고', '길동', 21);
-- 인서트인투는 데이터의 입력 
-- insert into 대상테이블이름
-- 테이블안에 추가할 데이터들의 열이름(칼럼명)임
-- VALUES는 실제로 저장될 값들임
-- 입력되는 데이터들 순서대로 앞의 괄호가 순서를 잡아주고
-- 뒤에 있는 밸류는 순서가 잡히 열에 데이터를 넣어준다
-- 앞부분의 내용은 계속 들어감
-- 엑셀시트의 열에 데이터를 mysql이나 크롤링프로그램이 가져올 수있다. 데이터들을
INSERT INTO member (last_name, first_name, age) VALUES ('박', '희동', 18);
INSERT INTO member (last_name, first_name, age) VALUES ('고', '영희', 35);
INSERT INTO member (last_name, first_name, age) VALUES ('고', '철수', 10);
INSERT INTO member (last_name, first_name, age) VALUES ('박', '정자', 28);

desc 테이블명;
--해당 테이블에 관한 데이터들이 있음

drop table 테이블명;
--이것을 하면 테이블이 삭제가 됨

