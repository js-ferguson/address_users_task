import { mount } from '@vue/test-utils'
import { describe, it, expect } from 'vitest'
import Addresses from '../../views/Addresses.vue'

describe('Addresses', () => {
  it('should render', async () => {
    const wrapper = mount(Addresses, {
      propsData: { routeName: 'addresses' }
    })

    expect(wrapper.find('h4').exists()).toBeTruthy()

    expect(wrapper.find('#InputLine2').exists()).toBeTruthy()

    expect(wrapper.find('button[type="submit"]').exists()).toBeTruthy()
  })

  it('should update address', async () => {
    const wrapper = mount(Addresses, {
      propsData: { routeName: 'addresses' }
    })

    await wrapper.find('#InputLine2').setValue('Nibbelung')
  })
})
