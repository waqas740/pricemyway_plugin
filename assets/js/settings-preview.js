jQuery(document).ready(function ($) {
  function updateButtonPreview() {
    const label =
      $("#pricemyway_btn_label").val() || pricemywaySettings.buttonLabel;
    const width =
      $("#pricemyway_btn_width").val() || pricemywaySettings.buttonWidth;
    const bgColor =
      $("#pricemyway_btn_back_color").val() || pricemywaySettings.buttonBg;
    const borderColor =
      $("#pricemyway_btn_border_color").val() ||
      pricemywaySettings.buttonBorder;
    const textColor =
      $("#pricemyway_btn_text_color").val() || pricemywaySettings.buttonText;

    const borderRadius =
      $("#pricemyway_btn_border_radius").val() ||
      pricemywaySettings.buttonBorderRadius;

    $("#pricemyway-button-preview").html(
      `<button class="tw-font-medium tw-text-sm tw-px-5 tw-py-2.5 tw-text-center" style="background-color: ${bgColor}; color: ${textColor}; border: 2px solid ${borderColor}; width: ${width}; border-radius: ${borderRadius}px;">${label}</button>`
    );
  }

  function updateModalPreview() {
    const bgColor =
      $("#pricemyway_modal_back_color").val() || pricemywaySettings.modalBg;
    const headerBgColor =
      $("#pricemyway_modal_header_back_color").val() ||
      pricemywaySettings.modalHeaderBg;
    const headerTextColor =
      $("#pricemyway_modal_header_text_color").val() ||
      pricemywaySettings.modalHeaderTextColor;
    const modelBtnBg =
      $("#pricemyway_modal_btn_bg_color").val() ||
      pricemywaySettings.modalBtnBg;
    const modelBtnTextColor =
      $("#pricemyway_modal_btn_text_color").val() ||
      pricemywaySettings.modalBtnTextColor;
    const modalLabel = $("#pricemyway_modal_label").val() || "Make an Offer";
    const modalBtnLabel =
      $("#pricemyway_modal_btn_label").val() || "Submit Offer";

    $("#pricemyway-modal-preview").html(
      `<div  tabindex="-1" aria-hidden="true" class="tw-top-0 tw-right-0 tw-left-0 tw-z-50 tw-flex tw-justify-center tw-items-center tw-w-full md:tw-inset-0 tw-h-[calc(100%-1rem)] tw-max-h-full">
      <div class="tw-p-4 tw-w-full tw-max-w-md tw-max-h-full">
          <!-- Modal content -->
          <div class="tw-relative tw-bg-white tw-rounded-lg tw-shadow" style="background-color:${bgColor}">
              <!-- Modal header -->
              <div class="tw-flex tw-items-center tw-justify-between tw-p-4 md:tw-p-5 tw-border-b tw-rounded-t" style="background-color:${headerBgColor}">
                  <h3 class="tw-text-xl tw-font-semibold" style="color:${headerTextColor}">
                      ${modalLabel}
                  </h3>
                  <button type="button" class="tw-text-gray-400 tw-bg-transparent hover:tw-bg-gray-200 hover:tw-text-gray-900 tw-rounded-lg tw-text-sm tw-w-8 tw-h-8 tw-inline-flex tw-justify-center tw-items-center">
                      <svg class="tw-w-3 tw-h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                     
                  </button>
              </div>
              <!-- Modal body -->
              <div class="tw-p-4 md:tw-p-5">
                  <div class="tw-flex tw-flex-col tw-space-y-4">
                      <div>
                          <label for="offer_amount" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 dark:tw-text-white"><?php echo esc_html__('Offer Amount', 'pricemyway'); ?></label>
                          <input type="number" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-text-sm tw-rounded-lg tw-focus:ring-blue-500 tw-focus:border-blue-500 tw-w-full tw-p-2.5" placeholder="Enter your offer amount"  />
                      </div>
                      <div>
                          <label for="email" class="tw-block tw-mb-2 tw-text-sm tw-font-medium tw-text-gray-900 dark:tw-text-white"><?php echo esc_html__('Your Email', 'pricemyway'); ?></label>
                          <input type="email" class="tw-bg-gray-50 tw-border tw-border-gray-300 tw-text-gray-900 tw-text-sm tw-rounded-lg tw-focus:ring-blue-500 tw-focus:border-blue-500 tw-w-full tw-p-2.5" placeholder="name@company.com"  />
                      </div>
                      <button type="button" class="tw-w-full tw-font-medium tw-rounded-lg tw-text-sm tw-px-5 tw-py-2.5 tw-text-center" style="background-color:${modelBtnBg} ; color:${modelBtnTextColor} ">
                      ${modalBtnLabel}
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>`
    );
  }
  // Initialize the preview
  updateButtonPreview();
  updateModalPreview();

  // Update preview on input changes
  $(
    "#pricemyway_btn_label, #pricemyway_btn_width, #pricemyway_btn_back_color, #pricemyway_btn_border_color, #pricemyway_btn_text_color , #pricemyway_btn_border_radius"
  ).on("input", function () {
    updateButtonPreview();
  });
  $(
    "#pricemyway_modal_back_color, #pricemyway_modal_header_bg_color, #pricemyway_modal_header_text_color, #pricemyway_modal_btn_back_color, #pricemyway_modal_btn_text_color, #pricemyway_modal_label, #pricemyway_modal_btn_label"
  ).on("input", function () {
    updateModalPreview();
  });
});
