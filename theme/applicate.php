<?php /* Template Name: Aplicar al trabajo */
get_header();
$id = $_GET['t'];
$tdecode = base64_decode($id);
$post = get_post($tdecode);
?>

<div class="max-w-4xl mx-auto my-10">
<?php if ($post->_filled == 0 && $post != null) {
	?>
	<div class="flex items-center justify-center p-12">
		<div class="mx-auto w-full max-w-[550px] bg-white">
			<form class="py-6 px-9"
				action=""
					method="POST" >
				<div class="mb-5">
					<label for="email"
							class="mb-3 block text-base font-medium text-[#07074D]" >
						Plaza a la que aplicas:
					</label>
					<input hidden id="applicant_job_id" name="applicant_job_id" value="<?php echo $post->ID; ?>">
					<input
							type="text"
							name="job"
							id="job"
							value="<?php echo $post->post_title . ' - ' . $post->_job_location; ?>"
							disabled
							class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
				</div>
				<div class="mb-5">
					<label for="applicant_name"
							class="mb-3 block text-base font-medium text-[#07074D]" >
						Nombre completo
					</label>
					<input
							type="text"
							name="applicant_name"
							id="applicant_name"
							placeholder="Juan Pérez"
							class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-teal-600 focus:shadow-md"/>
				</div>
				<div class="mb-5">
					<label for="applicant_dpi"
						   class="mb-3 block text-base font-medium text-[#07074D]" >
						DPI
					</label>
					<input
							type="text"
							name="applicant_dpi"
							id="applicant_dpi"
							placeholder="2501200000005"
							class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-teal-600 focus:shadow-md"/>
				</div>
				<div class="mb-5">
					<label for="applicant_email" class="mb-3 block text-base font-medium text-[#07074D]">Correo electrónico: </label>
					<input
							type="email"
							name="applicant_email"
							id="applicant_email"
							placeholder="tucorreo@gmail.com"
							class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-teal-600 focus:shadow-md"
					/>
				</div>

				<div class="mb-6 pt-4">
					<label class="mb-5 block text-xl font-semibold text-[#07074D]">
						Adjuntar CV
					</label>

					<div class="mb-8">
						<input type="file" name="applicant_filex" id="applicant_filex" class="sr-only"/>
						<label for="applicant_filex" name="dddd" id="dddd" class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center">
							<div>
								<span class="mb-2 block text-xl font-semibold text-[#07074D]">Suelta tu archivo aquí</span>
								<span class="mb-2 block text-base font-medium text-[#6B7280]"> O </span>
								<span class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]">Explorar</span>
							</div>
						</label>
					</div>

					<div class="mb-5 rounded-md bg-[#F5F7FB] py-4 px-8" id="has_file" style="display:none">
						<div class="flex items-center justify-between">
							<span class="truncate pr-3 text-base font-medium text-[#07074D]">
							  <span id="name_file"></span>
							</span>
							<button class="text-[#07074D]">
								<svg
										width="10"
										height="10"
										viewBox="0 0 10 10"
										fill="none"
										xmlns="http://www.w3.org/2000/svg"
								>
									<path
											fill-rule="evenodd"
											clip-rule="evenodd"
											d="M0.279337 0.279338C0.651787 -0.0931121 1.25565 -0.0931121 1.6281 0.279338L9.72066 8.3719C10.0931 8.74435 10.0931 9.34821 9.72066 9.72066C9.34821 10.0931 8.74435 10.0931 8.3719 9.72066L0.279337 1.6281C-0.0931125 1.25565 -0.0931125 0.651788 0.279337 0.279338Z"
											fill="currentColor"
									/>
									<path
											fill-rule="evenodd"
											clip-rule="evenodd"
											d="M0.279337 9.72066C-0.0931125 9.34821 -0.0931125 8.74435 0.279337 8.3719L8.3719 0.279338C8.74435 -0.0931127 9.34821 -0.0931123 9.72066 0.279338C10.0931 0.651787 10.0931 1.25565 9.72066 1.6281L1.6281 9.72066C1.25565 10.0931 0.651787 10.0931 0.279337 9.72066Z"
											fill="currentColor"
									/>
								</svg>
							</button>
						</div>
					</div>

					<button type="submit" class="hover:shadow-form w-full rounded-md bg-teal-600 py-3 px-8 text-center text-base font-semibold text-white outline-none">
						Aplicar ahora
					</button>
				</div>
				<script>
					document.getElementById('applicant_filex').addEventListener('change',(e)=>{
						document.getElementById('dddd').style.display = 'none';
						document.getElementById('has_file').style.display = 'block';
						document.getElementById('name_file').innerHTML = e.target.files[0].name;
					})
				</script>
			</form>
		</div>
	</div>
	</div>
<?php } else { ?>

	<div class="flex items-center justify-center my-10 bg-white py-48">
		<div class="flex flex-col">
			<div class="flex flex-col items-center">
				<div class="text-slate-500 font-bold text-7xl">
					404
				</div>

				<div class="font-bold text-3xl xl:text-7xl lg:text-6xl md:text-5xl mt-10">
					Recurso no encontrado
				</div>

				<div class="text-gray-400 font-medium text-sm md:text-xl lg:text-2xl mt-8">
					El recurso que buscas no existe o no se encuentra disponible
				</div>
			</div>


		</div>
	</div>
</div>

	<?php
}
get_footer();
