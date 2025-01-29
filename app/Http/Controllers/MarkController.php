<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;

class MarkController extends Controller
{
    // Загрузка марки
    public function upload(Request $request) {

        //Валидация
        $validate = $request->validate([
            'mark_name' => 'required|string|max:255',
            'mark_photo' => 'required|image|mimes:svg|max:2048',
        ]);

        // Сохранение фото
        $file = $request->file('mark_photo');
        $timestamp = time();
        $photoPath = $file->storeAs('marks', $timestamp. '.'. $file->getClientOriginalExtension(), 'public');

        // Создание записи в бд
        Mark::create([
            'name' => $request->mark_name,
            'photo' => $photoPath,
        ]);

        return redirect()->back()->with('success', 'Марка успешно создана');
    }

    // Удаление марки
    public function delete($id) {

        // Находим марку
        $mark = Mark::findOrFail($id);

        // Удаляем марку
        if ($mark) {
            $mark->delete();
            return redirect()->back()->with('success', 'Марка успешно удалена');
        } else {
            return redirect()->back()->with('error', 'Ошибка удаления марки');
        }
    }

    // Восстановление марки
    public function restore($id) {

        // Находим марку
        $mark = Mark::onlyTrashed()->find($id);

        if ($mark) {
            // Восстанавливаем запись
            $mark->restore();
            return redirect()->back()->with('success', 'Марка успешно восстановлена');
        } else {
            return redirect()->back()->with('error', 'Ошибка восстановления марки');
        }
    }
}
