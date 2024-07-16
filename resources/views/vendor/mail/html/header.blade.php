@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://sneg.top/uploads/posts/2023-04/thumbs/1682361434_sneg-top-p-kartinki-khello-kitti-cherno-belie-instagr-6.png" class="logo" alt="Laravel Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
