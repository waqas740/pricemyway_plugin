document.addEventListener("DOMContentLoaded", function () {
  const offerButton = document.getElementById("pricemyway-offer-btn");
  const modal = document.getElementById("pricemyway-modal");
  const form = document.getElementById("pricemyway-offer-form");
  const closeButton = document.getElementById("pricemyway-modal-colse-btn");

  // Open the modal when the offer button is clicked
  offerButton.addEventListener("click", function () {
    modal.classList.remove("tw-hidden");
  });
  closeButton.addEventListener("click", function () {
    modal.classList.add("tw-hidden");
  });

  // Close the modal when clicking outside the form
  modal.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.classList.add("tw-hidden");
    }
  });

  // // Handle form submission
  // form.addEventListener("submit", function (event) {
  //   event.preventDefault(); // Prevent the default form submission behavior

  //   const formData = new FormData(form);
  //   const productID = formData.get("product_id");
  //   const offerAmount = formData.get("offer_amount");
  //   const email = formData.get("email");

  //   // Perform AJAX request
  //   fetch(ajaxurl, {
  //     method: "POST",
  //     headers: {
  //       "X-Requested-With": "XMLHttpRequest",
  //     },
  //     body: new URLSearchParams({
  //       action: "pricemyway_offer",
  //       product_id: productID,
  //       offer_amount: offerAmount,
  //       email: email,
  //     }),
  //   })
  //     .then((response) => response.json())
  //     .then((data) => {
  //       if (data.success) {
  //         alert(data.data.message);
  //         modal.classList.add("tw-hidden");
  //         form.reset();
  //       } else {
  //         alert(data.data.message || "Something went wrong. Please try again.");
  //       }
  //     })
  //     .catch((error) => {
  //       console.error("Error:", error);
  //       alert(
  //         "An error occurred while submitting your offer. Please try again."
  //       );
  //     });
  // });
});
