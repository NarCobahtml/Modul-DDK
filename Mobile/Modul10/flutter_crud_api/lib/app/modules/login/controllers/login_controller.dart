import 'package:get/get.dart';
import 'package:get_storage/get_storage.dart';
import 'package:flutter_crud_api/app/services/auth_api.dart';
import 'package:flutter_crud_api/app/data/user_model.dart';
import 'package:flutter_crud_api/app/routes/app_pages.dart';
import 'package:flutter/material.dart';

class LoginController extends GetxController {
  UserModel? userModel;
  final box = GetStorage();
  bool loginScreen = false;
  RxBool isLoading = false.obs;
  RxBool obsecureText = true.obs;
  TextEditingController emailC = TextEditingController();
  TextEditingController passC = TextEditingController();
  Future<void> login() async {
    loginScreen = false;
    update();
    userModel = await AuthApi().loginAPI(emailC.text, passC.text);
    if (userModel!.status == 200) {
      await box.write("token", userModel!.accessToken);
      await box.write("name", userModel!.name);
      await box.write("email", userModel!.email);
      update();
      Get.offAndToNamed(Routes.HOME);
    } else if (userModel!.status == 404) {
      loginScreen = true;
      update();
    }
  }
}
