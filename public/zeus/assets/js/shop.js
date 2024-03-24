
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.css" integrity="sha512-SZgE3m1he0aEF3tIxxnz/3mXu/u/wlMNxQSnE0Cni9j/O8Gs+TjM9tm1NX34nRQ7GiLwUEzwuE3Wv2FLz2667w==" crossorigin="anonymous" />
 
;(function () {
	const setLabel = (lbl, val) => {
		const label = $(`#slider-${lbl}-label`)
		label.text(val)
		const slider = $(`#slider-div .${lbl}-slider-handle`)
		const rect = slider[0].getBoundingClientRect()
		label.offset({
			top: rect.top - 30,
			left: rect.left,
		})
	}

	const setLabels = (values) => {
		setLabel("min", values[0])
		setLabel("max", values[1])
	}

	$("#ex2")
		.slider()
		.on("slide", function (ev) {
			setLabels(ev.value)
		})
	setLabels($("#ex2").attr("data-value").split(","))
})()
