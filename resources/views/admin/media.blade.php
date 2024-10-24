@vite(['resources/js/admin/media-upload.js'])

@extends('layouts.default')

@section('title', 'Media')

@section('content')
    <div id="media">

        <x-admin-sidepanel
            :user="$user"
        />

        <main class="main">

            <h1 class="main-title">Media</h1>

            <form id="mediaUploadForm" method="POST" action="/api/media">
                @csrf
                <label class="button">
                    <span>Upload files</span>
                    <x-icon.upload />
                    <input id="mediaUploadInput"
                           class="hidden"
                           type="file"
                           title="Select files to upload"
                           name="files"
                    />
                </label>
            </form>

            <h2>All files</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Upload</th>
                    </tr>
                </thead>
                <tbody id="mediaUploads">
                    <tr class="media-upload-item">
                        <td>
                            <div class="centered-row">
                                <figure>
                                    <img src="#" alt="Image preview" />
                                </figure>
                                <span>Filename.jpg</span>
                            </div>
                        </td>
                        <td>1.23 MB</td>
                        <td>2024-10-24 10:39</td>
                    </tr>
                </tbody>
            </table>

        </main>

        <aside id="fileView">

            <button id="closeFileViewButton"
                    class="button-transparent"
                    role="button"
                    title="Close file view"
                    aria-label="Close file view">
                <x-icon.x />
                <span>Close</span>
            </button>

            <section class="file-view-info">
                <h2>Filename.jpg</h2>
                <p>
                    <span>JPG/JPEG</span>
                    <span>2.5 MB</span>
                    <span>1080x720</span>
                </p>
            </section>

            <ul class="file-operations row no-style">
                <li>
                    <button class="file-operation-button button-transparent bold"
                            role="button"
                            title="Download the file"
                            aria-label="Click to download the file">
                        <x-icon.download />
                        <span>Download</span>
                    </button>
                </li>
                <li>
                    <button class="file-operation-button button-transparent bold"
                            role="button"
                            title="Delete the file"
                            aria-label="Click to delete the file">
                        <x-icon.trash />
                        <span>Delete</span>
                    </button>
                </li>
            </ul>

            <figure class="file-view-figure">
                <img src="#" alt="Image" />
            </figure>

        </aside>

    </div>
@endsection
