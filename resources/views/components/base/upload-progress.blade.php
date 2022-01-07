<div x-show="isUploading"
   class="progress mb-3">
   <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
      role="progressbar"
      x-bind:style="{width: progress  + '%'}"
      x-bind:aria-valuenow="progress"
      aria-valuemin="0"
      aria-valuemax="100"
      x-text="progress + '%'"></div>
</div>
