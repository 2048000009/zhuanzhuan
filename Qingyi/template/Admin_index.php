										   
													   
												   
<?php
define("PM_CALL", true);
include dirname(__FILE__) . "/../admin_global.func.php";
include dirname(__FILE__) . "/../../config/mysql.func.php";
include dirname(__FILE__) . "/../../config/Conn.php";
if (isset($_COOKIE["Aname"])) {
	include dirname(__FILE__) . "/../../includes/getdata.php";
	include dirname(__FILE__) . "/../function/admin_cookie.inc.php";
	if (isset($_COOKIE["Aname"])) {
		($_GClassID = _fetch_array("SELECT * FROM goods_class WHERE gclass_id=1 AND gc_type='zhuanzhuan'")) || exit("SQL执行错误");
	}
} else {
	_location("你还未登录非法操作！", "/admin.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>后台首页 - 六月后台管理</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport"
			content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<link rel="stylesheet" href="/Qingyi/assets/layuiadmin/layui/css/layui.css" media="all">
		<link rel="stylesheet" href="/Qingyi/assets/layuiadmin/style/admin.css" media="all">
	</head>
	<body class="layui-layout-body">

		<div id="LAY_app">
			<div class="layui-layout layui-layout-admin">
				<div class="layui-header">
				
			
					<!-- 头部区域 	-->

					
					<ul class="layui-nav layui-layout-left">
						<li class="layui-nav-item layadmin-flexible" lay-unselect>
							<a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
								<i style="color: #448ef6;" class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
							</a>
						</li>
						<li class="layui-nav-item layui-hide-xs" lay-unselect>
							<a href="#" target="_blank" title="后台">
								<i class="layui-icon layui-icon-website"></i>
							</a>
						</li>
						<li class="layui-nav-item" lay-unselect>
							<a href="javascript:;" layadmin-event="refresh" title="刷新">
								<i style="color: #5FB878;" class="layui-icon layui-icon-refresh-3"></i>
							</a>
						</li>
						<li class="layui-nav-item layui-hide-xs" lay-unselect>
							<input type="text" placeholder="搜索..." autocomplete="off"
								class="layui-input layui-input-search" layadmin-event="serach"
								lay-action="https://www.baidu.com/">
						</li>
					</ul>
					<ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">

						<li class="layui-nav-item layui-hide-xs" lay-unselect>
							<a href="javascript:;" layadmin-event="theme">
								<i class="layui-icon layui-icon-theme"></i>
							</a>
						</li>
						<li class="layui-nav-item layui-hide-xs" lay-unselect>
							<a href="javascript:;" layadmin-event="note">
								<i class="layui-icon layui-icon-note"></i>
							</a>
						</li>
						<li class="layui-nav-item layui-hide-xs" lay-unselect>
							<a href="javascript:;" layadmin-event="fullscreen">
								<i class="layui-icon layui-icon-screen-full"></i>
							</a>
						</li>
					

						
						<li class="layui-nav-item" lay-unselect>
							<a href="javascript:;">
							    <img style="width: 30px; height: 30px;" src="http://q1.qlogo.cn/g?b=qq&nk=955854&s=640"
											alt="">
								<cite>六月科技</cite>
							</a>
							<dl class="layui-nav-child">
								<dd><a lay-href="?Admin=Goods_Class_Edit1">基本资料</a></dd>
								<dd><a lay-href="?Admin=Admin_Edit&id=<?php echo $_AID;?>">修改密码</a></dd>
								<hr>
								<a href="/admin.php" ><dd layadmin-event="logout" style="text-align: center;">退出</dd></a>
							</dl>
						</li>

						<li class="layui-nav-item layui-hide-xs" lay-unselect>
							<a href="javascript:;" layadmin-event="about"><i
									class="layui-icon layui-icon-more-vertical"></i></a>
						</li>
						<li class="layui-nav-item layui-show-xs-inline-block layui-hide-sm" lay-unselect>
							<a href="javascript:;" layadmin-event="more"><i
								style="color: #e23e57;"	class="layui-icon layui-icon-more-vertical"></i></a>
						</li>
					</ul>
				</div>

				 <!--侧边菜单 -->
				<div class="layui-side layui-side-menu">
					<div class="layui-side-scroll">
						<div class="layui-logo" lay-href="/Qingyi/index/index.php/">
							<img style="width: 30px; height: 30px;" src="http://q2.qlogo.cn/headimg_dl?dst_uin=<?php echo $_GClassID['web_name2'];?>&spec=100"
											alt="">&nbsp;&nbsp;<span>六月科技</span>
						</div>

						<ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu"
							lay-filter="layadmin-system-side-menu">
							<li data-name="home" class="layui-nav-item layui-nav-itemed">
								<a href="javascript:;" lay-tips="主页" lay-direction="2">
									<svg class="icon" style="width: 1em;height: 1em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="459"><path d="M432.945843 735.84018l-44.76273-44.770893a33.199603 33.199603 0 0 0-4.461171-5.56728l-36.958742-36.95466a33.220011 33.220011 0 0 0-5.550954-4.448927l-44.774974-44.787219c-7.734601-7.738683-19.967108-8.150923-27.183349-0.934683-7.220322 7.224403-6.804 19.452829 0.930601 27.175185l1.248965 1.253047c0.02449 0.085713 10.261102 36.138343-14.236565 64.260456l-133.708605 133.716768c-57.117684 57.10544-65.407381 8.538673-81.754124 14.550846-21.277297 7.836641-1.126517 30.224128-1.122436 30.22821l123.190364 123.198527c19.032425 19.028344 29.979233 14.22432 19.036507-24.648685-15.12635-53.72997 26.881311-61.5911 26.87723-61.5911 61.231921-14.012077 70.178753-56.729934 70.178752-56.729934 6.955019-32.795526 58.040122-71.497104 58.040123-71.497104 28.538434-28.530271 67.627763-17.305916 67.688986-17.285508l1.069375 1.069375c7.734601 7.738683 19.958945 8.150923 27.175185 0.934683 7.228485-7.212159 6.804-19.436502-0.922438-27.171104z" fill="#C9D2E3" p-id="460"></path><path d="M444.492644 724.297461l-44.76273-44.770893c0.828562 0.828562 1.563247 1.742836 2.195892 2.73058a49.244309 49.244309 0 0 0-6.657063-8.29786l-36.962824-36.962824a49.701446 49.701446 0 0 0-8.277452-6.640736c0.983662 0.628564 1.897936 1.371412 2.726498 2.199973l-44.774974-44.787219c-14.114117-14.118199-36.664868-14.538602-50.272869-0.938765-6.412168 6.41625-9.942738 15.0488-9.938656 24.297669 0.004082 9.608048 3.967299 19.085486 10.873339 25.9752l1.232638 1.240801a16.322254 16.322254 0 0 1-4.195868-7.236648c0.326527 1.21223 7.391748 28.367008-10.795789 49.232064 0.244895-0.273466 0.502035-0.555095 0.763256-0.812235l-133.708605 133.716769c-30.077191 30.069028-38.407704 23.901755-46.460669 17.942642-6.069315-4.493824-16.224296-12.003938-29.383322-7.167261-11.591698 4.273418-18.971202 12.918213-20.248738 23.73441-2.016302 17.081428 11.954959 32.905729 15.710017 35.403658a16.318172 16.318172 0 0 1-2.489766-2.040792L152.259404 1004.318603c15.007984 15.007984 28.330273 19.269157 39.591363 12.669236 16.514088-9.673354 12.256996-33.562864 6.706042-53.29324-2.62854-9.326419-4.636679-22.322182 0.689788-31.228198 4.701985-7.86113 13.63249-9.92233 13.722285-9.938657 8.265207-1.595899 13.795753-9.167237 12.999844-17.546729a16.318172 16.318172 0 0 0-0.028571-0.285711 16.330417 16.330417 0 0 1-12.583523 17.750808c70.615482-16.154909 82.064325-67.137973 82.517381-69.301212 4.1224-19.436502 34.036328-48.244321 51.92591-61.831913 0.587748-0.444893 1.155088-0.934683 1.677531-1.453044 21.154849-21.154849 50.485111-13.461064 51.72183-13.122292a16.28552 16.28552 0 0 1-7.110119-4.163216l1.069375 1.069375c14.101872 14.105954 36.648541 14.526357 50.25246 0.934683 6.404005-6.395842 9.938657-15.020229 9.942739-24.256853 0.008163-9.624375-3.950973-19.114057-10.861095-26.024179z m-22.167082 27.171104c-0.628564 0.624482-2.575479 0.579585-4.085665-0.934683l-1.08162-1.081619a16.379396 16.379396 0 0 0-6.522371-3.983626c-0.477545-0.159182-48.595337-14.363094-84.243891 21.277296 0.526524-0.526524 1.089783-1.020396 1.685695-1.465288-5.722381 4.334642-56.166675 43.460705-64.150254 81.121479-0.281629 1.155088-8.47745 32.905729-57.848288 44.203553a16.326335 16.326335 0 1 0 0.559177-0.114285c-2.302013 0.440811-22.869114 4.889737-35.019989 24.575217-9.424377 15.248797-10.934563 34.595505-4.489742 57.476863 4.632598 16.452864 3.677507 21.493621 3.636691 21.693619 0.17959-0.873459 1.485697-3.78771 4.987695-5.657076 3.493836-1.861202 6.628492-1.326515 7.448891-0.995906-0.02449-0.008163-2.55099-1.073457-7.848886-6.371352l-123.194445-123.182201a16.318172 16.318172 0 0 0 0.648972 0.685706c-2.081608-2.3714-4.318316-6.208089-4.51015-7.746846 0.159182 1.244883-0.857133 3.45302-1.910182 4.146889 0.004082-0.004082 0.285711-0.187753 0.991825-0.440811-2.277524 0.836725-4.538721 0.379587-5.281569 0.028571 0.714277 0.338771 2.587724 1.72651 3.959136 2.738743 20.252819 14.995739 45.056604 22.820135 88.978528-21.093625l133.712687-133.72085c0.261221-0.261221 0.518361-0.542851 0.763256-0.820399 29.836378-34.244488 18.163048-77.558256 17.648768-79.378642a16.326335 16.326335 0 0 0-4.167297-7.13869l-1.248964-1.253047c-1.187741-1.187741-1.310188-2.428542-1.310189-2.910169 0-0.371424 0.065305-0.881622 0.371424-1.187741 0.555095-0.559177 2.534664-0.620401 4.093829 0.934683l44.774975 44.783138c0.828562 0.828562 1.742836 1.567328 2.726498 2.195892 1.05713 0.681625 2.008139 1.444881 2.820374 2.257116l36.962824 36.958742c0.828562 0.820398 1.567328 1.755081 2.261197 2.828537 0.632645 0.987743 1.367331 1.9061 2.195892 2.734661l44.76273 44.770894c1.175496 1.171415 1.297944 2.424461 1.297944 2.906087 0 0.346935-0.065305 0.853051-0.375506 1.15917z" fill="#6E6E96" p-id="461"></path><path d="M892.838303 28.571087s-2.089771 4.106073-5.387691 10.559057c-0.085713-1.64896-0.085713-3.318328-0.20816-4.959124L309.804459 611.60085l113.688436 113.688436 1.88161-1.608144 1.902018 5.383609c43.256626-43.260707 58.391138 20.763017 100.5539-26.020097C651.5718 565.760582 914.172742 245.295026 892.838303 28.571087z" fill="#FFFFFF" p-id="462"></path><path d="M878.283375 21.179339l-5.359119 10.510078a16.314091 16.314091 0 0 1 30.832284 6.612166 82.407178 82.407178 0 0 1-0.069387-1.738755c-0.032653-1.061212-0.07755-2.261197-0.159182-3.538733a16.326335 16.326335 0 0 0-27.836402-10.399876L298.26174 600.058131a16.334499 16.334499 0 0 0 0 23.085438l113.688436 113.688436a16.301846 16.301846 0 0 0 22.10994 0.910194l1.914262-1.624471a16.33858 16.33858 0 0 1-25.991525-6.98359l1.902018 5.383609a16.310009 16.310009 0 0 0 11.787614 10.477426 16.322254 16.322254 0 0 0 15.150839-4.375458c14.236564-14.232483 20.660977-12.126386 33.460824-7.910109 15.603895 5.126469 39.191368 12.881479 67.680824-18.726307 118.386339-131.353531 391.342259-461.239383 369.122116-687.00403a16.326335 16.326335 0 0 0-30.803713-5.79993z m-362.575256 670.938915c-14.240646 15.795729-20.187514 13.848814-33.224093 9.563151-15.252879-5.016267-38.309746-12.599849-66.750222 15.844709a16.314091 16.314091 0 0 1 15.150839-4.37954 16.33858 16.33858 0 0 1 11.787615 10.481508l-1.902018-5.379528a16.318172 16.318172 0 0 0-11.159051-10.322325 16.383478 16.383478 0 0 0-14.832475 3.338735l-1.848958 1.579573a16.289601 16.289601 0 0 1 22.10994 0.906112l-113.688437-113.688437a16.334499 16.334499 0 0 1 0 23.085438L898.785171 45.717821a16.326335 16.326335 0 0 1-27.836402-10.399876c0.053061 0.648972 0.07755 1.440799 0.089795 2.277524l0.089795 2.363237a16.342662 16.342662 0 0 0 12.889641 15.146758 16.314091 16.314091 0 0 0 17.946725-8.534592l5.41218-10.608037a16.354906 16.354906 0 0 1-17.587545 8.636632 16.314091 16.314091 0 0 1-13.216169-14.428399c20.963015 212.817863-245.376658 533.818106-360.865072 661.947186z" fill="#6E6E96" p-id="463"></path><path d="M388.872901 665.057353s57.142174-16.326335 84.354093-16.326335 356.314107-330.122583 410.807333-593.625554c0 0-2.640785 288.865934-380.872997 667.094063l-49.950423-8.583571-25.930302 15.444714-38.407704-64.003317z" fill="#6E6E96" opacity=".15" p-id="464"></path><path d="M138.537119 964.36806s-45.191296-81.415353 43.538255-108.839515c88.729551-27.415999 144.059502-243.935859 241.597111-110.537454 0 0-119.153677 18.024274-146.361515 115.982287s-102.766118 2.88568-94.113161 126.614813l-44.66069-23.220131z" fill="#6E6E96" opacity=".2" p-id="465"></path><path d="M581.944062 763.015366c7.21624 7.21624 19.436502 6.799919 27.167022-0.934683l1.077538-1.069375c0.061224-0.020408 39.150552-11.244763 67.688986 17.285508 0 0 51.085103 38.693415 58.036041 71.497104 0 0 8.950913 42.72602 70.182834 56.729934-0.008163 0 42.003579 7.86113 26.873148 61.5911-10.946808 38.873005 0.008163 43.677029 19.036507 24.648685 19.04467-19.036507 123.194445-123.198527 123.194446-123.198527 0.004082-0.004082 20.154861-22.391569-1.118354-30.22821-16.350825-6.020336-24.640522 42.554593-81.754125-14.550846l-133.708605-133.716769c-24.497666-28.122113-14.256972-64.178824-14.232483-64.260456l1.248965-1.257128c7.738683-7.726438 8.150923-19.954863 0.934682-27.171103-7.21624-7.220322-19.452829-6.799919-27.183348 0.934682l-44.779056 44.78722c-1.95916 1.261209-3.832607 2.734661-5.546873 4.448926l-36.958742 36.95466a33.436335 33.436335 0 0 0-4.465252 5.567281L582.8665 735.84018c-7.73052 7.734601-8.150923 19.958945-0.922438 27.175186z" fill="#C9D2E3" p-id="466"></path><path d="M560.462686 750.305314c0 9.244787 3.534652 17.861011 9.94682 24.252771 13.599837 13.599837 36.146507 13.179434 50.25246-0.930601l1.069375-1.069375c-1.824468 1.820386-4.057094 3.183635-6.522371 3.983626-0.236732 0.081632-0.342853 0.110203-0.587748 0.179589 1.23672-0.338771 30.558818-8.032557 51.72183 13.118211 0.518361 0.526524 1.089783 1.012233 1.67345 1.457125 17.889582 13.587593 47.807592 42.403575 51.929991 61.835995 0.448974 2.155076 11.901898 53.146303 82.521462 69.301213a16.326335 16.326335 0 1 1-12.608012-17.469179c-0.795909 8.379492 4.734637 15.954911 13.008007 17.546729 0.085713 0.02449 9.016219 2.081608 13.714122 9.942738 5.33463 8.914179 3.318328 21.901779 0.693869 31.224116-5.550954 19.730376-9.808046 43.623968 6.710124 53.297322 11.26109 6.595839 24.579298 2.330584 39.587282-12.669236l123.194445-123.198527a16.44062 16.44062 0 0 1-2.485684 2.040792c3.755057-2.502011 17.7304-18.32223 15.714097-35.403658-1.273454-10.816197-8.657039-19.469155-20.248737-23.73441-13.163108-4.84484-23.318089 2.673437-29.383322 7.171343-8.061128 5.963194-16.391641 12.130467-46.464751-17.942643l-133.708605-133.72085c0.25714 0.261221 0.518361 0.542851 0.763256 0.820398-18.183456-20.869138-11.126398-48.032079-10.799871-49.236146a16.354906 16.354906 0 0 1-4.191786 7.232567l1.23672-1.23672c6.901958-6.893795 10.865176-16.367151 10.873339-25.979281 0-9.252951-3.522407-17.877337-9.942738-24.289506-13.608001-13.599837-36.15467-13.179434-50.268787 0.934683l-44.779056 44.783138a15.999809 15.999809 0 0 1 2.730579-2.19181 49.248391 49.248391 0 0 0-8.277452 6.640736l-36.958741 36.958742a49.611652 49.611652 0 0 0-6.657064 8.29786c0.628564-0.987743 1.363249-1.9061 2.191811-2.734661l-44.76273 44.774975c-6.942774 6.914203-10.893747 16.403885-10.885584 26.011934z m32.652671-0.016327c0-0.481627 0.122448-1.734673 1.297943-2.906087l44.76273-44.770894c0.828562-0.828562 1.563247-1.746918 2.191811-2.734661 0.693869-1.08162 1.436718-2.008139 2.265279-2.828537l36.966905-36.958742c0.812235-0.812235 1.767326-1.575491 2.820374-2.257116 0.97958-0.628564 1.897936-1.367331 2.726498-2.195892l44.779057-44.783138c1.559165-1.559165 3.53057-1.489778 4.093828-0.934683 0.306119 0.306119 0.375506 0.816317 0.375506 1.187741 0 0.481627-0.122448 1.722428-1.310189 2.910169l-1.253046 1.253047a16.28552 16.28552 0 0 0-4.167297 7.13869c-0.510198 1.820386-12.179446 45.142317 17.648769 79.378642 0.248977 0.277548 0.497953 0.559177 0.767337 0.820399l133.712687 133.72085c43.926005 43.913761 68.725709 36.089364 88.98261 21.093625 1.367331-1.012233 3.240778-2.399971 3.963218-2.742824-0.74693 0.355098-3.008127 0.812235-5.285652-0.02449a4.897901 4.897901 0 0 1 0.987744 0.440811c-1.048967-0.693869-2.065281-2.902006-1.9061-4.146889-0.199998 1.538757-2.432624 5.371364-4.51015 7.746846 0.938764-1.077538 1.946915-1.934671 3.138738-2.726498-0.897948 0.595911-1.72651 1.277536-2.481603 2.040792L840.475664 981.212757c-5.293814 5.297896-7.824396 6.363189-7.848886 6.371352 0.820398-0.330608 3.959136-0.865296 7.444809 0.995906 3.497917 1.869365 4.812187 4.783616 4.991777 5.657076-0.048979-0.208161-0.995906-5.240754 3.636691-21.693619 6.444821-22.881359 4.934635-42.228066-4.493823-57.476863-12.154957-19.677316-32.722058-24.126242-35.01999-24.575217a16.33858 16.33858 0 0 1 13.175353 17.583464 16.314091 16.314091 0 0 1-0.020408 0.281629 16.334499 16.334499 0 0 0-12.579441-17.750808c-49.379001-11.297824-57.566659-43.048465-57.85237-44.203553-7.98766-37.660774-58.423791-76.782755-64.154335-81.121479 0.595911 0.444893 1.155088 0.938764 1.685694 1.465288-35.648553-35.632227-83.766345-21.436478-84.247972-21.277296a16.212051 16.212051 0 0 0-6.526452 3.983626s-1.069375 1.069375-1.089783 1.081619c-1.502023 1.510186-3.45302 1.563247-4.081584 0.934683-0.318364-0.306119-0.379587-0.812235-0.379587-1.179578z" fill="#6E6E96" p-id="467"></path><path d="M487.977838 703.048736c42.166843 46.783114 57.301356-17.24061 100.562063 26.020097l1.897937-5.383609 1.885691 1.608144 113.688437-113.688437L128.569891 34.17102c-0.114284 1.640797-0.122448 3.310164-0.208161 4.959124C125.059729 32.67716 122.97404 28.571087 122.97404 28.571087c-21.330357 216.723939 241.266503 537.189495 365.003798 674.477649z" fill="#FFFFFF" p-id="468"></path><path d="M119.957749 12.526381a16.326335 16.326335 0 0 0-13.228413 14.448807C84.505112 252.739835 357.461032 582.625686 475.847371 713.979217c28.489455 31.607785 52.076928 23.856858 67.680823 18.722226 12.803929-4.208113 19.22426-6.322373 33.456743 7.910109a16.318172 16.318172 0 0 0 26.942535-6.101968l1.902018-5.379527a16.310009 16.310009 0 0 1-11.150887 10.314162 16.367151 16.367151 0 0 1-14.836557-3.338736l1.914263 1.628552a16.301846 16.301846 0 0 0 22.114021-0.906111l113.688436-113.688437a16.322254 16.322254 0 0 0 0-23.081356L140.11261 22.624219a16.334499 16.334499 0 0 0-27.83232 10.399876c-0.085713 1.277536-0.126529 2.477521-0.159182 3.538733-0.020408 0.624482-0.040816 1.21223-0.069387 1.738755a16.334499 16.334499 0 0 1 12.889642-15.146758 16.314091 16.314091 0 0 1 17.946724 8.534592L137.524886 21.179339a16.305927 16.305927 0 0 0-17.567137-8.652958z m19.260994 17.644687a16.314091 16.314091 0 0 1-13.22025 14.428399 16.350825 16.350825 0 0 1-17.583463-8.636632l5.41218 10.608037a16.314091 16.314091 0 0 0 30.836366-6.612166c0.040816-0.836725 0.069387-1.616307 0.089795-2.363237 0.02449-0.836725 0.048979-1.628552 0.093877-2.277524a16.326335 16.326335 0 0 1-27.832321 10.399876l577.437993 577.425748a16.330417 16.330417 0 0 1 0-23.085438l-113.688436 113.688436a16.301846 16.301846 0 0 1 22.10994-0.906111l-1.844876-1.579573a16.346743 16.346743 0 0 0-25.995608 6.98359l-1.902018 5.379527a16.314091 16.314091 0 0 1 11.787614-10.481507 16.358988 16.358988 0 0 1 15.159003 4.379539c-28.448639-28.444558-51.497343-20.856893-66.750223-15.844708-13.032497 4.285663-18.979365 6.232579-33.224092-9.563151C384.619891 563.989174 118.280218 242.988931 139.218743 30.171068z" fill="#6E6E96" p-id="469"></path><path d="M626.939442 665.057353s-57.134011-16.326335-84.350012-16.326335c-27.207838 0-356.318188-330.118501-410.807332-593.625554 0 0 2.644866 288.865934 380.872996 667.094063l49.950423-8.583571 25.930302 15.444714 38.403623-64.003317z" fill="#6E6E96" opacity=".15" p-id="470"></path><path d="M877.279305 964.36806s45.191296-81.415353-43.534173-108.839515c-88.733633-27.415999-144.059502-243.935859-241.597111-110.537454 0 0 119.149596 18.024274 146.357434 115.982287s102.766118 2.88568 94.117242 126.614813l44.656608-23.220131z" fill="#6E6E96" opacity=".2" p-id="471"></path></svg>
									<cite>六月科技</cite>
								</a>
								<dl class="layui-nav-child">
									<dd data-name="console" class="layui-this">
										<a lay-href="/Qingyi/index/index.html">主页</a>
									</dd>
								</dl>
							</li>
							<li data-name="Qingyi" class="layui-nav-item">
		
								<a href="javascript:;" lay-tips="交易猫" lay-direction="2">
								    <i style="color: #4262c5; font-size: 17px;" class="layui-icon layui-icon-release"></i>
									<cite >交易猫&nbsp;&nbsp;[双端跳转版本]</cite>
								</a>
								<dl class="layui-nav-child">
									<dd>
										<a lay-href="?Admin=jymlb">商品管理</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=jymadd">商品添加</a>
									</dd>
									<dd data-name="workorder">
										<a href="/jymtz" target="_blank" >跳转APP/IOS</a>
									</dd>
									<dd data-name="workorder">
										<a href="/jymtz/index1.php" target="_blank" >跳转APP/安卓</a>
									</dd>
										<dd data-name="workorder">
										<a lay-href="/jymtz/tx.php">更改链接</a>
									</dd>
										</dd>
										<dd data-name="workorder">
										<a lay-href="http://www.metools.info/master/m56.html">短链接生成</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_OrderList120888">商品记录</a>
									</dd>
								</dl>
							</li>							<li data-name="Qingyi" class="layui-nav-item">
															<a href="javascript:;" lay-tips="交易猫tz" lay-direction="2">
								    <i style="color: #4262c5; font-size: 17px;" class="layui-icon layui-icon-release"></i>
									<cite >交易猫&nbsp;&nbsp;[验证码版本]</cite>
								</a>
								<dl class="layui-nav-child">
									<dd>
										<a lay-href="?Admin=Goods_List10">商品管理</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_Add10">商品添加</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_OrderList120888">商品记录</a>
									</dd>
								</dl>
							</li>
							<li data-name="Qingyi" class="layui-nav-item">
								<a href="javascript:;" lay-tips="转转" lay-direction="2">
									<i style="color: #4262c5; font-size: 17px;" class="layui-icon layui-icon-release"></i>
									<cite>转转&nbsp;&nbsp;[最新验机模板]</cite>
								</a>
								<dl class="layui-nav-child">
									<dd>
										<a lay-href="?Admin=Goods_List3">商品管理</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_Add3">商品添加</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_OrderList3">商品记录</a>
									</dd>
								</dl>
							</li>
							<li data-name="Qingyi" class="layui-nav-item">
								<a href="javascript:;" lay-tips="转转" lay-direction="2">
									<i style="color: #4262c5; font-size: 17px;" class="layui-icon layui-icon-release"></i>
									<cite>转转&nbsp;&nbsp;[最新游戏模板]</cite>
								</a>
								<dl class="layui-nav-child">
									<dd>
										<a lay-href="?Admin=Goods_List11">商品管理</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_Add11">商品添加</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_OrderList11">商品记录</a>
									</dd>
								</dl>
							</li>
							<li data-name="Qingyi" class="layui-nav-item">
								<a href="javascript:;" lay-tips="转转" lay-direction="2">
									<i style="color: #4262c5; font-size: 17px;" class="layui-icon layui-icon-release"></i>
									<cite>转转&nbsp;&nbsp;[老旧物品模板]</cite>
								</a>
								<dl class="layui-nav-child">
									<dd>
										<a lay-href="?Admin=Goods_List2">商品管理</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_Add2">商品添加</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_OrderList2">商品记录</a>
									</dd>
								</dl>
							</li>
							<li data-name="Qingyi" class="layui-nav-item">
								<a href="javascript:;" lay-tips="闲鱼" lay-direction="2">
									<i style="color: #4262c5; font-size: 17px;" class="layui-icon layui-icon-release"></i>
									<cite>闲鱼&nbsp;&nbsp;[老旧通用模板]</cite>
								</a>
								<dl class="layui-nav-child">
									<dd>
										<a lay-href="?Admin=Goods_List8">商品管理</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_Add8">商品添加</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_OrderList8">商品记录</a>
									</dd>
								</dl>
							</li>
							<li data-name="Qingyi" class="layui-nav-item">
								<a href="javascript:;" lay-tips="京东" lay-direction="2">
									<i style="color: #4262c5; font-size: 17px;" class="layui-icon layui-icon-release"></i>
									<cite>京东&nbsp;&nbsp;[万能采集模板]</cite>
								</a>
								<dl class="layui-nav-child">
									<dd>
										<a lay-href="?Admin=Goods_List12">商品管理</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_Add12">商品添加</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=Goods_OrderList120888">商品记录</a>
									</dd>
								</dl>
							</li>
													    <li data-name="Qingyi" class="layui-nav-item">
								<a href="javascript:;" lay-tips="代练妈妈" lay-direction="2">
									<i style="color: #4262c5; font-size: 17px;" class="layui-icon layui-icon-release"></i>
									<cite>代练妈妈&nbsp;&nbsp;[最新模板]</cite>
								</a>
								<dl class="layui-nav-child">
									<dd>
										<a lay-href="?Admin=dlmmlb">商品管理</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=dlmmadd">商品添加</a>
									</dd>
								</dl>
							</li>
													    <li data-name="Qingyi" class="layui-nav-item">
								<a href="javascript:;" lay-tips="快手优店" lay-direction="2">
									<i style="color: #4262c5; font-size: 17px;" class="layui-icon layui-icon-release"></i>
									<cite>快手优店&nbsp;&nbsp;[最新模板]</cite>
								</a>
								<dl class="layui-nav-child">
									<dd>
										<a lay-href="?Admin=ksydlb">商品管理</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=ksydadd">商品添加</a>
									</dd>
								</dl>
							</li>
													    <li data-name="Qingyi" class="layui-nav-item">
								<a href="javascript:;" lay-tips="淘手游" lay-direction="2">
									<i style="color: #4262c5; font-size: 17px;" class="layui-icon layui-icon-release"></i>
									<cite>淘手游&nbsp;&nbsp;[最新模板]</cite>
								</a>
								<dl class="layui-nav-child">
									<dd>
										<a lay-href="?Admin=tsylb">商品管理</a>
									</dd>
									<dd data-name="workorder">
										<a lay-href="?Admin=tsyadd">商品添加</a>
									</dd>
								</dl>
							</li>
							<li data-name="user" class="layui-nav-item">
								<a href="javascript:;" lay-tips="用户" lay-direction="2">
									<i style="color: #e23e57; font-size: 17px;" class="layui-icon layui-icon-user"></i>
									<cite>用户管理</cite>
								</a>
								<dl class="layui-nav-child">
									<dd>
										<a lay-href="?Admin=Admin_List">用户管理</a>
									</dd>
																		<dd>
										<a lay-href="?Admin=Admin_Add">添加用户</a>
									</dd>
									</dd>
																		<dd>
										<a lay-href="?Admin=Admin_Edit&id=1">修改密码</a>
									</dd>									
								</dl>
							</li>
							<li data-name="set" class="layui-nav-item">
								<a href="javascript:;" lay-tips="设置" lay-direction="2">
									<i style="color: #e23e57; font-size: 17px;" class="layui-icon layui-icon-set"></i>
									<cite>网站设置</cite>
								</a>
								<dl class="layui-nav-child">
									<dd class="layui-nav-itemed">
										<a href="javascript:;">基本设置</a>
										<dl class="layui-nav-child">
											<dd><a lay-href="?Admin=Admin_Edit&id=<?php echo $_AID;?>">修改密码</a></dd>
											<dd><a lay-href="?Admin=Goods_Class_Edit1">信息设置</a></dd>
										</dl>
									</dd>
								</dl>
							</li>
						</ul>
					</div>
				</div>

				<!-- 页面标签 -->
				<div class="layadmin-pagetabs" id="LAY_app_tabs">
					<div style="color: #604fdd;" class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
					<div style="color: #604fdd;" class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
					<div style="color: #c62727;" class="layui-icon layadmin-tabs-control layui-icon-down">
						<ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
							<li class="layui-nav-item" lay-unselect>
								<a href="javascript:;"></a>
								<dl class="layui-nav-child layui-anim-fadein">
									<dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
									<dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
									<dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
								</dl>
							</li>
						</ul>
					</div>
					<div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
						<ul class="layui-tab-title" id="LAY_app_tabsheader">
							<li lay-id="/Qingyi/index/index.html" lay-attr="/Qingyi/index/index.html" class="layui-this"><i
									class="layui-icon layui-icon-console" style="color: #4586ff;" ></i></li>
						</ul>
					</div>
				</div>


				<!-- 主体内容 -->
				<div class="layui-body" id="LAY_app_body">
					<div class="layadmin-tabsbody-item layui-show">
						<iframe src="/Qingyi/index/index.html" frameborder="0" class="layadmin-iframe"></iframe>
					</div>
				</div>

				<!-- 辅助元素，一般用于移动设备下遮罩 -->
				<div class="layadmin-body-shade" layadmin-event="shade"></div>
			</div>
		</div>
	<audio autoplay>
  <source src="https://api.uomg.com/api/rand.music?sort=热歌榜" type="audio/mpeg">
    </audio>

		<script src="/Qingyi/assets/layuiadmin/layui/layui.js"></script>
		<script>
			layui.config({
				base: '/Qingyi/assets/layuiadmin/' //静态资源所在路径
			}).extend({
				index: 'lib/index' //主入口模块
			}).use('index');
		</script>

	</body>
</html>
