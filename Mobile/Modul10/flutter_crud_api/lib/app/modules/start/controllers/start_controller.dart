import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:flutter_crud_api/app/services/auth_api.dart';
import 'package:flutter_crud_api/app/data/user_model.dart';
import 'package:flutter_crud_api/app/routes/app_pages.dart';

class StartController extends GetxController {
  UserModel? userModel;
  final box = GetStorage();
  bool startScreen = false;
  autoLogin() async {
    startScreen = false;
    update();
    if (box.hasData("token") == true) {
      userModel = await AuthApi().checkTokenApi(box.read("token"));
      if (userModel!.status == 200) {
        Get.offAndToNamed(Routes.HOME);
      } else if (userModel!.status == 404) {
        startScreen = true;
        update();
      } else if (userModel!.status == 401) {
        box.remove("token");
        box.remove("id");
        Get.offAndToNamed(Routes.LOGIN);
      } else {
        box.remove("token");
        box.remove("id");
        Get.offAndToNamed(Routes.LOGIN);
      }
    } else {
      Get.offAndToNamed(Routes.LOGIN);
    }
  }
}
