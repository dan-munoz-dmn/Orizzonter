<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the announcements.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $announcements = Announcement::with('moderator')->latest()->paginate(10);
        return view('announcements.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new announcement.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $users = \App\Models\User::all()->pluck('name', 'id'); // Corregido: Usa el modelo User
        return view('announcements.create', compact('users'));
    }

    /**
     * Store a newly created announcement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:50',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Cambiado a image_url
            'moderator_id' => 'required|exists:users,id',
        ]);

        $data = $request->except('image_url'); // Excluye image_url del request

        try {
            if ($request->hasFile('image_url')) { // Cambiado a image_url
                $path = $request->file('image_url')->store('announcements', 'public'); // Cambiado a image_url
                $data['image_url'] = Storage::url($path); // Usa 'image_url'
            }
        } catch (\Exception $e) {
            Log::error('Error al guardar la imagen de la noticia: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'No se pudo guardar la imagen. Por favor, inténtelo de nuevo.'])->withInput();
        }

        Announcement::create($data);

        return redirect()->route('announcements.index')->with('success', 'Noticia creada exitosamente.');
    }

    /**
     * Display the specified announcement.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\View\View
     */
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified announcement.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\View\View
     */
    public function edit(Announcement $announcement)
    {
        $users = \App\Models\User::all()->pluck('name', 'id'); // Corregido: Usa el modelo User
        return view('announcements.edit', compact('announcement', 'users'));
    }

    /**
     * Update the specified announcement in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Announcement $announcement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:50',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Cambiado a image_url
            'moderator_id' => 'required|exists:users,id',
        ]);

        $data = $request->except('image_url'); // Excluye image_url del request

        try {
            if ($request->hasFile('image_url')) { // Cambiado a image_url
                // Eliminar la imagen anterior si existe
                if ($announcement->image_url) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $announcement->image_url));
                }
                $path = $request->file('image_url')->store('announcements', 'public'); // Cambiado a image_url
                $data['image_url'] = Storage::url($path); // Usa 'image_url'
            }
        } catch (\Exception $e) {
            Log::error('Error al actualizar la imagen de la noticia: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'No se pudo actualizar la imagen. Por favor, inténtelo de nuevo.'])->withInput();
        }

        $announcement->update($data);

        return redirect()->route('announcements.index')->with('success', 'Noticia actualizada exitosamente.');
    }

    /**
     * Remove the specified announcement from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Announcement $announcement)
    {
        // Eliminar la imagen asociada si existe
        if ($announcement->image_url) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $announcement->image_url));
        }

        $announcement->delete();
        return redirect()->route('announcements.index')->with('success', 'Noticia eliminada exitosamente.');
    }
}